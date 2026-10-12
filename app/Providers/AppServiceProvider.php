<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Em shared hosting o dump-autoload costuma ficar desatualizado após deploy por FTP.
        // Carregar aqui garante whatsapp_url() mesmo sem regenerar o vendor/composer.
        $helpers = app_path('helpers.php');

        if (is_file($helpers)) {
            require_once $helpers;
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
