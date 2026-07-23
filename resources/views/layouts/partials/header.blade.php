@php
    $nav = [
        ['label' => 'Início', 'route' => 'home'],
        ['label' => 'Serviços', 'route' => 'services'],
        ['label' => 'Cases', 'route' => 'cases'],
        ['label' => 'Sobre', 'route' => 'about'],
        ['label' => 'Contato', 'route' => 'contact'],
    ];
@endphp

<header class="sticky top-0 z-50 border-b border-brand-950/5 bg-white/85 backdrop-blur-md">
    <div class="mx-auto flex h-16 max-w-6xl items-center justify-between gap-4 px-4 sm:px-6 lg:px-8">
        <a href="{{ route('home') }}" class="shrink-0" aria-label="DMTA — Página inicial">
            <img src="{{ asset('images/brand/dmta-wordmark.svg') }}" alt="DMTA" class="h-8 w-auto" width="168" height="40">
        </a>

        <nav class="hidden items-center gap-1 md:flex" aria-label="Principal">
            @foreach ($nav as $item)
                <a
                    href="{{ route($item['route']) }}"
                    @class([
                        'rounded-lg px-3 py-2 text-sm font-semibold transition',
                        'bg-brand-50 text-brand-700' => request()->routeIs($item['route']),
                        'text-muted hover:bg-brand-50 hover:text-brand-700' => ! request()->routeIs($item['route']),
                    ])
                >
                    {{ $item['label'] }}
                </a>
            @endforeach
        </nav>

        <div class="hidden items-center gap-2 md:flex">
            <x-whatsapp-button size="sm" label="WhatsApp" />
            <a
                href="{{ route('contact') }}"
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
                    href="{{ route($item['route']) }}"
                    @class([
                        'rounded-lg px-3 py-2.5 text-sm font-semibold',
                        'bg-brand-50 text-brand-700' => request()->routeIs($item['route']),
                        'text-ink hover:bg-brand-50' => ! request()->routeIs($item['route']),
                    ])
                >
                    {{ $item['label'] }}
                </a>
            @endforeach
            <div class="mt-2 flex flex-col gap-2 border-t border-brand-950/5 pt-3">
                <x-whatsapp-button class="w-full justify-center" />
                <a
                    href="{{ route('contact') }}"
                    class="inline-flex items-center justify-center rounded-lg bg-brand-500 px-4 py-2.5 text-sm font-bold text-white"
                >
                    Solicitar orçamento
                </a>
            </div>
        </nav>
    </div>
</header>
