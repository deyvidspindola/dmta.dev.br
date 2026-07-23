<?php

if (! function_exists('whatsapp_url')) {
    function whatsapp_url(?string $message = null): string
    {
        $phone = preg_replace('/\D+/', '', (string) config('dmta.whatsapp', '5519982624408'));
        $text = $message ?: 'Olá! Vim pelo site da DMTA e quero conversar sobre um projeto.';

        return 'https://wa.me/'.$phone.'?text='.rawurlencode($text);
    }
}
