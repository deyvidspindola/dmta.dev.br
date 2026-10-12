<?php

namespace App\Http\Controllers;

use App\Exceptions\EmailDeliveryException;
use App\Http\Requests\ContactRequest;
use App\UseCases\SendContactEmail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    public function store(ContactRequest $request, SendContactEmail $sendContact): RedirectResponse
    {
        if (filled($request->input('website'))) {
            return $this->confirmation();
        }

        $data = $request->validated();

        $lead = [
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'] ?? null,
            'project_type' => $data['project_type'],
            'message' => $data['message'],
        ];

        try {
            $sendContact->execute($data['send_intent'], $lead);
        } catch (\Throwable $e) {
            Log::error('Falha ao entregar o contato do site', [
                'failure' => $e instanceof EmailDeliveryException ? $e->deliveryStatus : 'internal_error',
            ]);

            return redirect('/#contato')
                ->withInput()
                ->with('error', 'Não foi possível confirmar o envio da mensagem. Para evitar duplicidade, fale com a gente pelo WhatsApp.');
        }

        return $this->confirmation();
    }

    private function confirmation(): RedirectResponse
    {
        return redirect('/#contato')
            ->with('success', 'Mensagem aceita para envio. Em breve entraremos em contato.');
    }
}
