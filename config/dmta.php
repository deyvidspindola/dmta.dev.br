<?php

return [
    'whatsapp' => env('CONTACT_WHATSAPP', '5519982624408'),
    'contact_email' => env('CONTACT_EMAIL', 'contato@dmta.dev.br'),
    'phone_display' => '(19) 98262-4408',
    'phone_tel' => '+5519982624408',

    /*
    | O plano do MailerSend cobre um único domínio, então o lead do formulário é
    | repassado para o Emprega Paulínia, que envia o e-mail pelo domínio
    | verificado. Sem endpoint ou token configurados, o envio cai no mailer local.
    */
    'relay' => [
        'endpoint' => env('CONTACT_RELAY_ENDPOINT'),
        'token' => env('CONTACT_RELAY_TOKEN'),
        'site' => env('CONTACT_RELAY_SITE', 'dmta.dev.br'),
    ],
];
