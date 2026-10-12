<?php

namespace App\UseCases;

use App\Exceptions\EmailDeliveryException;
use App\Mail\ContactMail;
use App\Repositories\ContactDeliveryRepository;
use App\Services\EmailService;

/** Renderiza o contato e preserva a mesma intenção e conteúdo em repetições. */
final class SendContactEmail
{
    public function __construct(
        private EmailService $emails,
        private ContactDeliveryRepository $deliveries,
    ) {}

    /** @param array{name: string, email: string, phone: ?string, project_type: string, message: string} $lead */
    public function execute(string $intent, array $lead): void
    {
        $recipient = config('dmta.contact_email');
        $fingerprint = hash('sha256', json_encode([$recipient, $lead], JSON_THROW_ON_ERROR));
        $payload = [
            'to' => [['email' => $recipient, 'name' => 'DMTA']],
            'company_name' => 'DMTA',
            'subject' => 'Novo contato pelo site — '.$lead['project_type'],
            'html_base64' => base64_encode((new ContactMail($lead))->render()),
            'text_base64' => base64_encode("Novo contato pelo site\nNome: {$lead['name']}\nE-mail: {$lead['email']}\nTelefone: ".($lead['phone'] ?? '—')."\nTipo: {$lead['project_type']}\n\n{$lead['message']}"),
            'reply_to' => ['email' => $lead['email'], 'name' => $lead['name']],
            'metadata' => ['reference' => $intent, 'domain' => EmailService::PROJECT_DOMAIN],
        ];
        $delivery = $this->deliveries->intention($intent, $fingerprint, $payload);

        if (! hash_equals($delivery->fingerprint, $fingerprint)) {
            throw new EmailDeliveryException('conflict', 409);
        }
        if ($delivery->status === 'accepted') {
            return;
        }
        if (! $this->deliveries->claim($delivery)) {
            throw new EmailDeliveryException($delivery->fresh()->status);
        }

        try {
            $result = $this->emails->send($delivery->payload, $delivery->idempotency_key);
        } catch (EmailDeliveryException $e) {
            $this->deliveries->record($delivery, $e->deliveryStatus, $e->httpStatus, $e->result);
            throw $e;
        }
        $this->deliveries->record($delivery, 'accepted', 202, $result);
    }
}
