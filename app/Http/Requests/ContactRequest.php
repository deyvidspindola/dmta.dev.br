<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:180'],
            'phone' => ['nullable', 'string', 'max:40'],
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
            'message' => ['required', 'string', 'max:5000'],
            'website' => ['nullable', 'string', 'max:200'],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Informe seu nome.',
            'email.required' => 'Informe um e-mail válido.',
            'email.email' => 'Informe um e-mail válido.',
            'project_type.required' => 'Selecione o tipo de projeto.',
            'project_type.in' => 'Selecione um tipo de projeto válido.',
            'message.required' => 'Escreva uma mensagem.',
        ];
    }
}
