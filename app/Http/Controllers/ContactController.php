<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactMail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(ContactRequest $request): RedirectResponse
    {
        if (filled($request->input('website'))) {
            return redirect('/#contato')
                ->with('success', 'Mensagem enviada com sucesso. Em breve entraremos em contato.');
        }

        Mail::to(config('dmta.contact_email'))->send(
            new ContactMail($request->validated())
        );

        return redirect('/#contato')
            ->with('success', 'Mensagem enviada com sucesso. Em breve entraremos em contato.');
    }
}
