<?php

namespace App\Exceptions;

use RuntimeException;

/** Falha controlada, sem incluir token, corpo HTTP ou dados do visitante. */
class EmailDeliveryException extends RuntimeException
{
    public function __construct(
        public readonly string $deliveryStatus,
        public readonly ?int $httpStatus = null,
        public readonly array $result = [],
    ) {
        parent::__construct('O integrador não confirmou a aceitação do e-mail.');
    }
}
