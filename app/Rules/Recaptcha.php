<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class Recaptcha implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $secretKey = config('services.recaptcha.secret_key');

        if (blank($secretKey)) {
            $fail('A verificação anti-spam não está configurada.');

            return;
        }

        if (blank($value)) {
            $fail('Confirme que você não é um robô.');

            return;
        }

        try {
            $result = Http::asForm()
                ->timeout(10)
                ->post('https://www.google.com/recaptcha/api/siteverify', [
                    'secret' => $secretKey,
                    'response' => $value,
                    'remoteip' => request()->ip(),
                ])
                ->json();
        } catch (\Throwable $e) {
            Log::warning('Falha ao consultar o reCAPTCHA', ['exception' => $e->getMessage()]);
            $fail('Não conseguimos validar a verificação anti-spam. Tente novamente.');

            return;
        }

        if (($result['success'] ?? false) !== true) {
            $fail('Verificação anti-spam inválida. Marque a caixa novamente.');
        }
    }
}
