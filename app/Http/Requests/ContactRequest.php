<?php

namespace App\Http\Requests;

use App\Rules\Recaptcha;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'name' => trim((string) $this->input('name', '')),
            'email' => strtolower(trim((string) $this->input('email', ''))),
            'phone' => trim((string) $this->input('phone', '')),
            'message' => trim((string) $this->input('message', '')),
            'website' => trim((string) $this->input('website', '')),
        ]);

        if ($this->input('phone') === '') {
            $this->merge(['phone' => null]);
        }
    }

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:2', 'max:120'],
            'email' => ['required', 'email:filter', 'max:180'],
            'phone' => ['nullable', 'string', 'max:20', 'regex:/^\(\d{2}\) \d{4,5}-\d{4}$/'],
            'project_type' => [
                'required',
                'string',
                Rule::in([
                    'Site institucional',
                    'Sistema sob medida',
                    'E-commerce',
                    'Manutenção / suporte',
                    'Outro',
                ]),
            ],
            'message' => ['required', 'string', 'min:10', 'max:5000'],
            'website' => ['nullable', 'string', 'max:200'],
            'g-recaptcha-response' => filled(config('services.recaptcha.secret_key'))
                ? ['required', new Recaptcha()]
                : ['nullable'],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Informe seu nome.',
            'name.min' => 'Informe um nome válido.',
            'email.required' => 'Informe um e-mail válido.',
            'email.email' => 'Informe um e-mail válido.',
            'phone.regex' => 'Informe um WhatsApp válido, com DDD.',
            'project_type.required' => 'Selecione o tipo de projeto.',
            'project_type.in' => 'Selecione um tipo de projeto válido.',
            'message.required' => 'Escreva uma mensagem.',
            'message.min' => 'Conte um pouco mais sobre o que você precisa.',
            'g-recaptcha-response.required' => 'Confirme que você não é um robô.',
        ];
    }
}
