@extends('layouts.app')

@section('title', 'Sobre — DMTA')
@section('meta_description', 'A DMTA desenvolve sites e sistemas sob medida há mais de 10 anos, com foco em resultado e suporte próximo.')

@section('content')
    <section class="bg-mesh border-b border-brand-950/5">
        <div class="mx-auto max-w-6xl px-4 py-16 sm:px-6 lg:px-8">
            <p class="text-sm font-bold uppercase tracking-wider text-brand-500">Sobre</p>
            <h1 class="mt-3 max-w-3xl text-4xl font-extrabold sm:text-5xl text-balance">
                Tecnologia com cara de negócio — não de template.
            </h1>
            <p class="mt-5 max-w-2xl text-lg text-muted">
                A DMTA nasceu para transformar ideias em soluções digitais úteis: sites que convertem, sistemas que organizam e produtos que as pessoas realmente usam.
            </p>
        </div>
    </section>

    <section class="bg-white py-16">
        <div class="mx-auto grid max-w-6xl gap-12 px-4 sm:px-6 lg:grid-cols-12 lg:px-8">
            <div class="lg:col-span-7">
                <h2 class="text-2xl font-bold sm:text-3xl">Quem somos</h2>
                <div class="mt-5 space-y-4 text-muted leading-relaxed">
                    <p>
                        Somos uma empresa de desenvolvimento digital baseada em Paulínia e região (Interior de SP), com mais de 10 anos de experiência em TI.
                    </p>
                    <p>
                        Trabalhamos lado a lado com quem precisa de presença online profissional ou de um sistema sob medida — do briefing à publicação, com comunicação direta e linguagem clara.
                    </p>
                    <p>
                        Além dos projetos sob demanda, mantemos produtos próprios como o
                        <a href="https://empregapaulinia.com.br" class="font-semibold text-brand-600 underline-offset-2 hover:underline" target="_blank" rel="noopener noreferrer">Emprega Paulínia</a>
                        e o
                        <a href="https://linksnabio.app.br" class="font-semibold text-brand-600 underline-offset-2 hover:underline" target="_blank" rel="noopener noreferrer">Links na Bio</a>,
                        que mostram na prática como entregamos software de ponta a ponta.
                    </p>
                </div>
            </div>
            <aside class="lg:col-span-5">
                <div class="rounded-2xl bg-brand-950 p-8 text-white">
                    <h3 class="font-display text-lg font-bold text-white">No que acreditamos</h3>
                    <ul class="mt-6 space-y-4 text-sm text-white/75">
                        <li class="border-b border-white/10 pb-4">Resultado comercial acima de estética vazia</li>
                        <li class="border-b border-white/10 pb-4">Código e UX pensados para o dia a dia do cliente</li>
                        <li class="border-b border-white/10 pb-4">Proximidade: WhatsApp, telefone e resposta objetiva</li>
                        <li>Produtos reais em produção, não só slides</li>
                    </ul>
                </div>
            </aside>
        </div>
    </section>

    <section class="border-t border-brand-950/5 bg-surface py-16">
        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-bold sm:text-3xl">Por que a DMTA</h2>
            <div class="mt-10 grid gap-8 sm:grid-cols-3">
                @foreach ([
                    ['t' => 'Foco em conversão', 'd' => 'Cada página e fluxo é pensado para gerar contato, venda ou operação mais rápida.'],
                    ['t' => 'Sob medida', 'd' => 'Sem empurrar pacote genérico. Montamos o que o seu negócio realmente precisa.'],
                    ['t' => 'Suporte próximo', 'd' => 'Canal direto, prioridades claras e evolução contínua depois do go-live.'],
                ] as $item)
                    <div>
                        <h3 class="text-lg font-bold">{{ $item['t'] }}</h3>
                        <p class="mt-2 text-sm leading-relaxed text-muted">{{ $item['d'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="border-t border-brand-950/5 bg-white py-16">
        <div class="mx-auto max-w-6xl px-4 text-center sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold">Vamos conversar sobre o seu projeto</h2>
            <p class="mx-auto mt-3 max-w-xl text-muted">
                Orçamento sem compromisso — por formulário ou WhatsApp.
            </p>
            <div class="mt-8 flex flex-wrap justify-center gap-3">
                <x-cta-button href="{{ route('contact') }}" size="lg">Solicitar orçamento</x-cta-button>
                <x-whatsapp-button size="lg" />
            </div>
        </div>
    </section>
@endsection
