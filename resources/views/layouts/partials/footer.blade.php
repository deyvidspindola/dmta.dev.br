<footer class="mt-auto border-t border-brand-950/10 bg-brand-950 text-white">
    <div class="mx-auto grid max-w-6xl gap-10 px-4 py-14 sm:px-6 lg:grid-cols-12 lg:px-8">
        <div class="lg:col-span-5">
            <img src="{{ asset('images/brand/dmta-wordmark-white.svg') }}" alt="DMTA" class="h-9 w-auto" width="178" height="40">
            <p class="mt-4 max-w-sm text-sm leading-relaxed text-white/70">
                Sites, sistemas e soluções digitais sob medida — com cara profissional e foco em fechar negócio.
            </p>
            <div class="mt-6 flex flex-wrap gap-3">
                <x-whatsapp-button variant="on-dark" />
                <a
                    href="{{ route('contact') }}"
                    class="inline-flex items-center justify-center rounded-lg bg-white px-4 py-2.5 text-sm font-bold text-brand-950 transition hover:bg-brand-50"
                >
                    Solicitar orçamento
                </a>
            </div>
        </div>

        <div class="lg:col-span-3">
            <h3 class="font-display text-sm font-bold uppercase tracking-wider text-white/50">Navegação</h3>
            <ul class="mt-4 space-y-2 text-sm">
                <li><a class="text-white/80 transition hover:text-white" href="{{ route('home') }}">Início</a></li>
                <li><a class="text-white/80 transition hover:text-white" href="{{ route('services') }}">Serviços</a></li>
                <li><a class="text-white/80 transition hover:text-white" href="{{ route('cases') }}">Cases</a></li>
                <li><a class="text-white/80 transition hover:text-white" href="{{ route('about') }}">Sobre</a></li>
                <li><a class="text-white/80 transition hover:text-white" href="{{ route('contact') }}">Contato</a></li>
            </ul>
        </div>

        <div class="lg:col-span-4">
            <h3 class="font-display text-sm font-bold uppercase tracking-wider text-white/50">Contato</h3>
            <ul class="mt-4 space-y-3 text-sm text-white/80">
                <li>
                    <a class="transition hover:text-white" href="mailto:contato@dmta.dev.br">contato@dmta.dev.br</a>
                </li>
                <li>
                    <a class="transition hover:text-white" href="tel:+5519982624408">(19) 98262-4408</a>
                </li>
                <li class="text-white/60">Paulínia e região — Interior de SP</li>
            </ul>
        </div>
    </div>

    <div class="border-t border-white/10">
        <div class="mx-auto flex max-w-6xl flex-col gap-2 px-4 py-5 text-xs text-white/45 sm:flex-row sm:items-center sm:justify-between sm:px-6 lg:px-8">
            <p>&copy; {{ date('Y') }} DMTA. Todos os direitos reservados.</p>
            <p>dmta.dev.br</p>
        </div>
    </div>
</footer>
