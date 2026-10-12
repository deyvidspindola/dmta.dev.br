<?php

namespace App\Services;

use App\Exceptions\EmailDeliveryException;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;

/** Cliente reutilizável do integrador; a identidade é sempre o domínio cadastrado. */
final class EmailService
{
    public const PROJECT_DOMAIN = 'dmta.com.br';

    /** @param array<string, mixed> $payload
     * @return array<string, mixed>
     */
    public function send(array $payload, string $idempotencyKey): array
    {
        $url = config('services.dmta_mailer.url');
        $token = config('services.dmta_mailer.token');

        if (! $url || ! $token || $token === 'COLE_O_TOKEN_DO_PROJETO_AQUI' || parse_url($url, PHP_URL_SCHEME) !== 'https') {
            throw new EmailDeliveryException('configuration_error');
        }

        try {
            $response = Http::withToken($token)
                ->asJson()
                ->acceptJson()
                ->connectTimeout(5)
                ->timeout(40)
                ->withHeaders([
                    'X-Project-Domain' => self::PROJECT_DOMAIN,
                    'Idempotency-Key' => $idempotencyKey,
                ])
                ->post(rtrim($url, '/').'/api/v1/emails', $payload);
        } catch (ConnectionException|RequestException $e) {
            throw new EmailDeliveryException('unknown');
        }

        $result = $response->json('data');
        $result = is_array($result) ? $result : [];

        if ($response->status() === 202 && ($result['status'] ?? null) === 'accepted') {
            return $result;
        }

        $status = match ($response->status()) {
            401 => 'unauthorized',
            404 => 'not_found',
            422 => 'validation_error',
            409 => 'conflict',
            429 => 'rate_limited',
            503 => 'unavailable',
            502 => ($result['status'] ?? null) === 'failed' ? 'failed' : 'unknown',
            default => 'unknown',
        };

        throw new EmailDeliveryException($status, $response->status(), $result);
    }
}
