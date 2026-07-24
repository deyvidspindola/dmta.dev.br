<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactMail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ContactController extends Controller
{
    public function store(ContactRequest $request): RedirectResponse
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
            $this->deliver($lead, $request->ip(), $request->userAgent());
        } catch (\Throwable $e) {
            Log::error('Falha ao entregar o contato do site', [
                'lead_email' => $lead['email'],
                'exception' => $e->getMessage(),
            ]);

            return redirect('/#contato')
                ->withInput()
                ->with('error', 'Não conseguimos enviar sua mensagem agora. Tente novamente em instantes ou fale com a gente no WhatsApp.');
        }

        return $this->confirmation();
    }

    /**
     * @param  array{name: string, email: string, phone: string|null, project_type: string, message: string}  $lead
     */
    private function deliver(array $lead, ?string $ip, ?string $userAgent): void
    {
        $endpoint = config('dmta.relay.endpoint');
        $token = config('dmta.relay.token');

        if (blank($endpoint) || blank($token)) {
            Mail::to(config('dmta.contact_email'))->send(new ContactMail($lead));

            return;
        }

        Http::asJson()
            ->acceptJson()
            ->withHeaders(['X-Relay-Token' => $token])
            ->timeout(15)
            ->retry(2, 400, throw: false)
            ->post($endpoint, [
                'site' => config('dmta.relay.site'),
                'name' => $lead['name'],
                'email' => $lead['email'],
                'phone' => $lead['phone'],
                'subject' => $lead['project_type'],
                'message' => $lead['message'],
                'meta' => [
                    'ip' => $ip,
                    'user_agent' => Str::limit((string) $userAgent, 480, ''),
                ],
            ])
            ->throw();
    }

    private function confirmation(): RedirectResponse
    {
        return redirect('/#contato')
            ->with('success', 'Mensagem enviada com sucesso. Em breve entraremos em contato.');
    }
}
