<?php

namespace App\Repositories;

use App\Models\ContactDelivery;

/** Persiste intenção, conteúdo imutável e resultado sem manter transações durante HTTP. */
final class ContactDeliveryRepository
{
    /** @param array<string, mixed> $payload */
    public function intention(string $id, string $fingerprint, array $payload): ContactDelivery
    {
        return ContactDelivery::firstOrCreate(['id' => $id], [
            'idempotency_key' => 'contact-'.$id,
            'fingerprint' => $fingerprint,
            'payload' => $payload,
        ]);
    }

    /** Apenas uma requisição pode iniciar a chamada de uma intenção. */
    public function claim(ContactDelivery $delivery): bool
    {
        return ContactDelivery::whereKey($delivery->id)->whereIn('status', ['pending', 'configuration_error'])
            ->update(['status' => 'sending']) === 1;
    }

    /** @param array<string, mixed> $result */
    public function record(ContactDelivery $delivery, string $status, ?int $httpStatus, array $result): void
    {
        $remoteStatus = $result['status'] ?? null;
        $delivery->update([
            'status' => is_string($remoteStatus) && in_array($remoteStatus, ['failed', 'unknown', 'sending'], true) ? $remoteStatus : $status,
            'http_status' => $httpStatus,
            'remote_id' => is_scalar($result['id'] ?? null) ? substr((string) $result['id'], 0, 255) : null,
            'provider_id' => is_scalar($result['provider_id'] ?? null) ? substr((string) $result['provider_id'], 0, 255) : null,
        ]);
    }
}
