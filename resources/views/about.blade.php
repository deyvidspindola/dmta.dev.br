@extends('layouts.app')

@section('title', 'Sobre — DMTA')
@section('meta_description', 'A DMTA desenvolve sites e sistemas sob medida há mais de 10 anos, com foco em resultado e suporte próximo.')

@section('content')
    <section class="relative isolate overflow-hidden">
        <img
            src="{{ asset('images/marketing/hero-workspace.jpg') }}"
            alt=""
            class="absolute inset-0 h-full w-full object-cover object-[center_30%]"
        >
        <div class="absolute inset-0 bg-brand-950/82" aria-hidden="true"></div>
        <div class="relative mx-auto max-w-6xl px-4 py-24 sm:px-6 lg:px-8">
            <p class="font-display text-sm font-bold uppercase tracking-[0.24em] text-brand-300">Sobre</p>
            <h1 class="mt-4 max-w-3xl text-4xl font-extrabold text-white sm:text-5xl text-balance">
                Tecnologia com cara de negócio — não de template.
            </h1>
            <p class="mt-5 max-w-2xl text-lg text-white/75">
                Sites que convertem, sistemas que organizam e produtos que as pessoas realmente usam.
            </p>
        </div>
    </section>

    <section class="bg-white py-20">
        <div class="mx-auto grid max-w-6xl gap-12 px-4 sm:px-6 lg:grid-cols-12 lg:px-8">
            <div class="reveal lg:col-span-7">
                <h2 class="text-2xl font-bold sm:text-3xl">Quem somos</h2>
                <div class="mt-5 space-y-4 text-muted leading-relaxed">
                    <p>
                        Somos uma empresa de desenvolvimento digital em Paulínia e região (Interior de SP), com mais de 10 anos de experiência em TI.
                    </p>
                    <p>
                        Trabalhamos lado a lado com quem precisa de presença online profissional ou de um sistema sob medida — do briefing à publicação, com comunicação direta.
                    </p>
                    <p>
                        Além dos projetos sob demanda, mantemos produtos próprios como o
                        <a href="https://empregapaulinia.com.br" class="font-semibold text-brand-600 underline-offset-2 hover:underline" target="_blank" rel="noopener noreferrer">Emprega Paulínia</a>
                        e o
                        <a href="https://linksnabio.app.br" class="font-semibold text-brand-600 underline-offset-2 hover:underline" target="_blank" rel="noopener noreferrer">Links na Bio</a>.
                    </p>
                </div>
            </div>
            <aside class="reveal reveal-delay-1 lg:col-span-5">
                <div class="overflow-hidden rounded-2xl bg-brand-950 text-white">
                    <img
                        src="{{ asset('images/marketing/case-emprega.jpg') }}"
                        alt=""
                        class="aspect-[16/10] w-full object-cover opacity-80"
                        loading="lazy"
                    >
                    <div class="p-8">
                        <h3 class="font-display text-lg font-bold text-white">No que acreditamos</h3>
                        <ul class="mt-6 space-y-4 text-sm text-white/75">
                            <li class="border-b border-white/10 pb-4">Resultado comercial acima de estética vazia</li>
                            <li class="border-b border-white/10 pb-4">Código e UX pensados para o dia a dia</li>
                            <li class="border-b border-white/10 pb-4">Proximidade: WhatsApp e resposta objetiva</li>
                            <li>Produtos reais em produção, não só slides</li>
                        </ul>
                    </div>
                </div>
            </aside>
        </div>
    </section>

    <section class="border-t border-brand-950/5 bg-mesh py-20">
        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
            <h2 class="reveal text-2xl font-bold sm:text-3xl">Por que a DMTA</h2>
            <div class="mt-10 grid gap-10 sm:grid-cols-3">
                @foreach ([
                    ['t' => 'Foco em conversão', 'd' => 'Cada página e fluxo é pensado para gerar contato, venda ou operação mais rápida.'],
                    ['t' => 'Sob medida', 'd' => 'Sem empurrar pacote genérico. Montamos o que o seu negócio realmente precisa.'],
                    ['t' => 'Suporte próximo', 'd' => 'Canal direto, prioridades claras e evolução contínua depois do go-live.'],
                ] as $i => $item)
                    <div @class(['reveal', 'reveal-delay-'.min($i + 1, 3)])>
                        <h3 class="text-lg font-bold">{{ $item['t'] }}</h3>
                        <p class="mt-2 text-sm leading-relaxed text-muted">{{ $item['d'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="bg-white py-20">
        <div class="mx-auto max-w-6xl px-4 text-center sm:px-6 lg:px-8">
            <div class="reveal">
                <h2 class="text-3xl font-bold">Vamos conversar sobre o seu projeto</h2>
                <p class="mx-auto mt-3 max-w-xl text-muted">Orçamento sem compromisso — por formulário ou WhatsApp.</p>
                <div class="mt-8 flex flex-wrap justify-center gap-3">
                    <x-cta-button href="{{ route('contact') }}" size="lg">Solicitar orçamento</x-cta-button>
                    <x-whatsapp-button size="lg" />
                </div>
            </div>
        </div>
    </section>
@endsection
