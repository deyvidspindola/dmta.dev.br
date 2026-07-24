@php
    $nav = [
        ['label' => 'Serviços', 'href' => '#servicos'],
        ['label' => 'Cases', 'href' => '#cases'],
        ['label' => 'Processo', 'href' => '#processo'],
        ['label' => 'Contato', 'href' => '#contato'],
    ];
@endphp

<header class="sticky top-0 z-50 border-b border-brand-950/5 bg-white/85 backdrop-blur-md">
    <div class="mx-auto flex h-16 max-w-6xl items-center justify-between gap-4 px-4 sm:px-6 lg:px-8">
        <a href="#inicio" class="inline-flex shrink-0 items-center gap-2.5" aria-label="DMTA — início">
            {{-- Temporário até escolha do monograma em /logo-preview --}}
            <svg width="32" height="32" viewBox="0 0 40 40" fill="none" aria-hidden="true">
                <rect width="40" height="40" rx="10" fill="#2B4DFF"/>
                <path d="M12 10h9.2c5.55 0 9.1 3.2 9.1 9.35S26.75 28.7 21.2 28.7H12V10zm4.7 4.55v9.6h4.35c2.7 0 4.35-1.55 4.35-4.8s-1.65-4.8-4.35-4.8H16.7z" fill="#fff"/>
            </svg>
            <span class="font-display text-lg font-bold tracking-tight text-brand-950">DMTA</span>
        </a>

        <nav class="hidden items-center gap-1 md:flex" aria-label="Principal">
            @foreach ($nav as $item)
                <a
                    href="{{ $item['href'] }}"
                    class="rounded-lg px-3 py-2 text-sm font-semibold text-muted transition hover:bg-brand-50 hover:text-brand-700"
                >
                    {{ $item['label'] }}
                </a>
            @endforeach
        </nav>

        <div class="hidden items-center gap-2 md:flex">
            <x-whatsapp-button size="sm" label="WhatsApp" />
            <a
                href="#contato"
                class="inline-flex items-center justify-center rounded-lg bg-brand-500 px-4 py-2 text-sm font-bold text-white shadow-sm transition hover:bg-brand-600"
            >
                Solicitar orçamento
            </a>
        </div>

        <button
            type="button"
            id="nav-toggle"
            class="inline-flex h-10 w-10 items-center justify-center rounded-lg border border-brand-950/10 text-brand-950 md:hidden"
            aria-expanded="false"
            aria-controls="mobile-nav"
            aria-label="Abrir menu"
        >
            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                <path stroke-linecap="round" d="M4 7h16M4 12h16M4 17h16"/>
            </svg>
        </button>
    </div>

    <div id="mobile-nav" class="hidden border-t border-brand-950/5 bg-white md:hidden">
        <nav class="mx-auto flex max-w-6xl flex-col gap-1 px-4 py-3" aria-label="Mobile">
            @foreach ($nav as $item)
                <a
                    href="{{ $item['href'] }}"
                    class="nav-mobile rounded-lg px-3 py-2.5 text-sm font-semibold text-ink hover:bg-brand-50"
                >
                    {{ $item['label'] }}
                </a>
            @endforeach
            <div class="mt-2 flex flex-col gap-2 border-t border-brand-950/5 pt-3">
                <x-whatsapp-button class="w-full justify-center" />
                <a
                    href="#contato"
                    class="nav-mobile inline-flex items-center justify-center rounded-lg bg-brand-500 px-4 py-2.5 text-sm font-bold text-white"
                >
                    Solicitar orçamento
                </a>
            </div>
        </nav>
    </div>
</header>
