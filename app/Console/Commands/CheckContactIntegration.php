<?php

namespace App\Console\Commands;

use App\Services\EmailService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Schema;

/** Diagnóstico no ambiente real, sem disparar e-mails nem revelar credenciais. */
class CheckContactIntegration extends Command
{
    protected $signature = 'contact:check {--core : Valida autenticação com um GET somente de leitura}';

    protected $description = 'Verifica configuração, banco e acesso ao integrador de contato sem enviar e-mail';

    public function handle(EmailService $emails): int
    {
        $failed = false;
        $configured = false;
        $this->line('Domínio enviado: '.EmailService::PROJECT_DOMAIN);
        $this->line('Cache de configuração: '.(app()->configurationIsCached() ? 'ativo' : 'inativo'));
        try {
            $emails->ensureConfigured();
            $configured = true;
            $this->info('URL HTTPS e token preenchido: OK (autenticação ainda não verificada).');
        } catch (\Throwable) {
            $failed = true;
            $this->error('Configuração inválida: confira DMTA_MAILER_URL e DMTA_MAILER_TOKEN; placeholder não é token válido.');
        }
        if (! filter_var(config('dmta.contact_recipient_email'), FILTER_VALIDATE_EMAIL)) {
            $failed = true;
            $this->error('Destinatário inválido: confira CONTACT_RECIPIENT_EMAIL.');
        }
        if (! config('app.key')) {
            $failed = true;
            $this->error('APP_KEY ausente: o payload persistido exige criptografia.');
        }
        try {
            if (! Schema::hasTable('contact_deliveries')) {
                $failed = true;
                $this->error('Tabela contact_deliveries ausente: aplique php artisan migrate --force.');
            } else {
                $this->info('Banco acessível e tabela contact_deliveries presente: OK.');
            }
        } catch (\Throwable) {
            $failed = true;
            $this->error('Banco indisponível: confira a conexão no ambiente do servidor.');
        }
        if ($this->option('core') && $configured) {
            try {
                $response = Http::withToken(trim(config('services.dmta_mailer.token')))
                    ->acceptJson()->connectTimeout(5)->timeout(40)
                    ->withHeaders(['X-Project-Domain' => EmailService::PROJECT_DOMAIN])
                    ->get($emails->endpoint(), ['page' => 1]);
                if ($response->status() === 200) {
                    $this->info('Core acessível e token autorizado na consulta: OK. Isso não valida o provedor de envio.');
                } else {
                    $failed = true;
                    $this->error('Consulta ao core retornou HTTP '.$response->status().'. Nenhum e-mail foi enviado.');
                }
            } catch (\Throwable) {
                $failed = true;
                $this->error('Não foi possível conectar ao core. Nenhum e-mail foi enviado.');
            }
        }

        return $failed ? self::FAILURE : self::SUCCESS;
    }
}
