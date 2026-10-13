<?php

namespace Tests\Feature;

use App\Models\ContactDelivery;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class ContactIntegratorTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        Http::preventStrayRequests();
        config([
            'services.dmta_mailer.url' => 'https://mailler.dmta.com.br',
            'services.dmta_mailer.token' => 'test-token',
            'services.dmta_mailer.domain' => 'dmta.dev.br', // Mesmo uma configuração incorreta não muda o domínio enviado.
            'services.recaptcha.secret_key' => null,
            'dmta.contact_email' => 'contato@dmta.com.br',
        ]);
    }

    private function contact(): array
    {
        return [
            'send_intent' => (string) Str::uuid(), 'name' => 'José Teste',
            'email' => 'jose@example.com', 'phone' => '(19) 99999-9999',
            'project_type' => 'Site institucional', 'message' => 'Preciso de um site com informação e ação.',
        ];
    }

    public static function hosts(): array
    {
        return [['dmta.dev.br'], ['dmta.com.br']];
    }

    #[DataProvider('hosts')]
    public function test_both_hosts_use_registered_domain_and_base64_contract(string $host): void
    {
        $lead = $this->contact();
        Http::fake(function ($request) use ($lead) {
            $delivery = ContactDelivery::firstOrFail(); // A intenção já existe antes do HTTP.
            $this->assertSame('sending', $delivery->status);
            $this->assertTrue($request->hasHeader('Authorization', 'Bearer test-token'));
            $this->assertTrue($request->hasHeader('X-Project-Domain', 'dmta.com.br'));
            $this->assertTrue($request->hasHeader('Idempotency-Key', 'contact-'.$lead['send_intent']));
            $this->assertTrue($request->hasHeader('Content-Type', 'application/json'));
            $this->assertTrue($request->hasHeader('Accept', 'application/json'));
            $this->assertSame([['email' => 'contato@dmta.com.br', 'name' => 'DMTA']], $request['to']);
            $this->assertSame(['email' => $lead['email'], 'name' => $lead['name']], $request['reply_to']);
            $this->assertStringContainsString('José Teste', base64_decode($request['html_base64'], true));
            $this->assertStringContainsString($lead['message'], base64_decode($request['text_base64'], true));
            foreach (['from', 'project_id', 'template_id', 'html', 'text'] as $field) {
                $this->assertArrayNotHasKey($field, $request->data());
            }

            return Http::response(['data' => ['id' => 'remote-1', 'provider_id' => 'provider-1', 'status' => 'accepted']], 202);
        });
        $this->post('https://'.$host.'/contato', $lead)->assertSessionHas('success');
        $this->assertDatabaseHas('contact_deliveries', ['id' => $lead['send_intent'], 'remote_id' => 'remote-1', 'provider_id' => 'provider-1', 'status' => 'accepted']);
    }

    public function test_same_intention_does_not_send_again_and_changed_payload_conflicts(): void
    {
        Http::fake(['*' => Http::response(['data' => ['id' => 'remote-1', 'status' => 'accepted']], 202)]);
        $lead = $this->contact();
        $this->post('/contato', $lead)->assertSessionHas('success');
        $payload = ContactDelivery::first()->payload;
        $this->post('/contato', $lead)->assertSessionHas('success');
        $lead['message'] = 'Outro conteúdo para a mesma intenção de envio.';
        $this->post('/contato', $lead)->assertSessionHas('error');
        Http::assertSentCount(1);
        $this->assertSame($payload, ContactDelivery::first()->payload);
    }

    public static function failures(): array
    {
        return [[401, 'unauthorized'], [404, 'not_found'], [422, 'validation_error'], [409, 'conflict'], [429, 'rate_limited'], [503, 'unavailable'], [502, 'unknown'], [200, 'unknown']];
    }

    #[DataProvider('failures')]
    public function test_failures_are_controlled_and_never_retried(int $httpStatus, string $status): void
    {
        Http::fake(['*' => Http::response(['data' => ['id' => 'failed-id', 'status' => $httpStatus === 200 ? 'accepted' : $status]], $httpStatus)]);
        $lead = $this->contact();
        $this->post('/contato', $lead)->assertSessionHas('error')->assertSessionMissing('success');
        $this->post('/contato', $lead)->assertSessionHas('error');
        Http::assertSentCount(1);
        $this->assertDatabaseHas('contact_deliveries', ['remote_id' => 'failed-id', 'status' => $status, 'http_status' => $httpStatus]);
    }

    public function test_timeout_preserves_intention_and_blocks_automatic_resend(): void
    {
        Http::fake(fn () => throw new ConnectionException('Simulated timeout'));
        $lead = $this->contact();
        $this->post('/contato', $lead)->assertSessionHas('error');
        $this->assertDatabaseHas('contact_deliveries', ['id' => $lead['send_intent'], 'status' => 'unknown', 'idempotency_key' => 'contact-'.$lead['send_intent']]);
        Http::fake(['*' => Http::response(['data' => ['status' => 'accepted']], 202)]);
        $this->post('/contato', $lead)->assertSessionHas('error');
        Http::assertNothingSent();
    }

    public function test_failed_provider_result_is_persisted_without_resend(): void
    {
        Http::fake(['*' => Http::response(['data' => ['id' => 'failed-remote', 'provider_id' => 'provider-failure', 'status' => 'failed']], 502)]);
        $lead = $this->contact();
        $this->post('/contato', $lead)->assertSessionHas('error');
        $this->post('/contato', $lead)->assertSessionHas('error');
        Http::assertSentCount(1);
        $this->assertDatabaseHas('contact_deliveries', ['status' => 'failed', 'remote_id' => 'failed-remote', 'provider_id' => 'provider-failure']);
    }

    public function test_202_without_accepted_status_is_not_success(): void
    {
        Http::fake(['*' => Http::response(['data' => ['id' => 'sending-remote', 'status' => 'sending']], 202)]);
        $this->post('/contato', $this->contact())->assertSessionHas('error')->assertSessionMissing('success');
        $this->assertDatabaseHas('contact_deliveries', ['remote_id' => 'sending-remote', 'status' => 'sending']);
    }

    public function test_missing_configuration_does_not_fall_back_to_mail_or_relay(): void
    {
        config(['services.dmta_mailer.token' => null]);
        $this->post('/contato', $this->contact())->assertSessionHas('error');
        Http::assertNothingSent();
        $this->assertDatabaseCount('contact_deliveries', 0);
    }

    public function test_missing_configuration_recovers_after_token_is_fixed(): void
    {
        $lead = $this->contact();
        config(['services.dmta_mailer.token' => 'COLE_O_TOKEN_DO_PROJETO_AQUI']);
        $this->post('/contato', $lead)->assertSessionHas('error');
        Http::assertNothingSent();
        config(['services.dmta_mailer.token' => 'test-token']);
        Http::fake(['*' => Http::response(['data' => ['id' => 'fixed', 'status' => 'accepted']], 202)]);
        $this->post('/contato', $lead)->assertSessionHas('success');
        Http::assertSentCount(1);
    }

    public function test_existing_configuration_error_can_recover_with_same_key_and_payload(): void
    {
        $lead = $this->contact();
        Http::fake(['*' => Http::response(['data' => ['id' => 'original', 'status' => 'accepted']], 202)]);
        $this->post('/contato', $lead)->assertSessionHas('success');
        $delivery = ContactDelivery::first();
        $originalPayload = $delivery->payload;
        $delivery->update(['status' => 'configuration_error', 'remote_id' => null, 'provider_id' => null, 'http_status' => null]);
        Http::fake(function ($request) use ($lead, $originalPayload) {
            $this->assertTrue($request->hasHeader('Idempotency-Key', 'contact-'.$lead['send_intent']));
            $this->assertSame($originalPayload, $request->data());

            return Http::response(['data' => ['id' => 'fixed', 'status' => 'accepted']], 202);
        });
        $this->post('/contato', $lead)->assertSessionHas('success');
        Http::assertSentCount(1);
    }

    public function test_complete_endpoint_is_not_appended_twice(): void
    {
        config(['services.dmta_mailer.url' => 'https://mailler.dmta.com.br/api/v1/emails/']);
        Http::fake(['https://mailler.dmta.com.br/api/v1/emails' => Http::response(['data' => ['id' => 'direct', 'status' => 'accepted']], 202)]);
        $this->post('/contato', $this->contact())->assertSessionHas('success');
        Http::assertSentCount(1);
    }

    public function test_diagnostic_checks_core_without_sending_mail(): void
    {
        Http::fake(function ($request) {
            $this->assertSame('GET', $request->method());
            $this->assertTrue($request->hasHeader('X-Project-Domain', 'dmta.com.br'));
            $this->assertTrue($request->hasHeader('Authorization', 'Bearer test-token'));

            return Http::response(['data' => []], 200);
        });
        $this->artisan('contact:check', ['--core' => true])->assertSuccessful();
        Http::assertSentCount(1);
    }

    public function test_diagnostic_rejects_placeholder_without_http(): void
    {
        config(['services.dmta_mailer.token' => 'COLE_O_TOKEN_DO_PROJETO_AQUI']);
        $this->artisan('contact:check', ['--core' => true])->assertFailed();
        Http::assertNothingSent();
    }

    public function test_diagnostic_rejects_unauthorized_core(): void
    {
        Http::fake(['*' => Http::response(['message' => 'Unauthorized'], 401)]);
        $this->artisan('contact:check', ['--core' => true])->assertFailed();
        Http::assertSentCount(1);
    }
}
