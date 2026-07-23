@extends('layouts.app')

@section('title', 'Serviços — DMTA')
@section('meta_description', 'Desenvolvimento web, sistemas personalizados, e-commerce e manutenção. Soluções digitais sob medida pela DMTA.')

@section('content')
    <section class="relative isolate overflow-hidden">
        <img
            src="{{ asset('images/marketing/hero-workspace.jpg') }}"
            alt=""
            class="absolute inset-0 h-full w-full object-cover"
        >
        <div class="absolute inset-0 bg-gradient-to-r from-brand-950/92 via-brand-950/80 to-brand-950/55" aria-hidden="true"></div>
        <div class="relative mx-auto max-w-6xl px-4 py-24 sm:px-6 lg:px-8">
            <p class="font-display text-sm font-bold uppercase tracking-[0.24em] text-brand-300">Serviços</p>
            <h1 class="mt-4 max-w-3xl text-4xl font-extrabold text-white sm:text-5xl text-balance">
                Soluções digitais pensadas para vender e operar melhor.
            </h1>
            <p class="mt-5 max-w-2xl text-lg text-white/75">
                Cada projeto começa pelo resultado: mais contatos, mais organização ou um produto próprio.
            </p>
            <div class="mt-8 flex flex-wrap gap-3">
                <x-cta-button href="{{ route('contact') }}">Solicitar orçamento</x-cta-button>
                <x-whatsapp-button variant="on-dark" message="Olá! Quero saber mais sobre os serviços da DMTA." />
            </div>
        </div>
    </section>

    <section class="bg-white py-20">
        <div class="mx-auto max-w-6xl space-y-16 px-4 sm:px-6 lg:px-8">
            @foreach ([
                [
                    'title' => 'Desenvolvimento Web',
                    'for' => 'Empresas e profissionais que precisam de presença online com cara de confiança.',
                    'points' => [
                        'Sites institucionais e landing pages de alta conversão',
                        'Identidade visual forte, sem cara de template',
                        'CTAs claros para WhatsApp, formulário e telefone',
                        'Performance e estrutura pronta para evoluir',
                    ],
                ],
                [
                    'title' => 'Sistemas personalizados',
                    'for' => 'Negócios cansados de planilha e ferramenta genérica que não encaixa.',
                    'points' => [
                        'Painéis e fluxos sob medida para a operação',
                        'Integração com o jeito que a equipe já trabalha',
                        'Controle de dados, permissões e relatórios',
                        'Base sólida para crescer sem recomeçar do zero',
                    ],
                ],
                [
                    'title' => 'E-commerce',
                    'for' => 'Marcas e lojas que querem vender online com autonomia.',
                    'points' => [
                        'Catálogo, carrinho e checkout pensados para o celular',
                        'Experiência de compra clara e confiável',
                        'Gestão simples de produtos e pedidos',
                        'Pronto para campanhas e crescimento',
                    ],
                ],
                [
                    'title' => 'Manutenção e suporte',
                    'for' => 'Quem já tem site ou sistema e precisa de estabilidade + evolução.',
                    'points' => [
                        'Correções, atualizações e melhorias pontuais',
                        'Ajustes de performance e segurança',
                        'Pequenas evoluções sem projeto do zero',
                        'Canal direto para priorizar o que importa',
                    ],
                ],
            ] as $i => $service)
                <article @class(['reveal', $i > 0 ? 'border-t border-brand-950/10 pt-16' : '', 'grid gap-8 lg:grid-cols-12'])>
                    <div class="lg:col-span-5">
                        <h2 class="text-2xl font-bold sm:text-3xl">{{ $service['title'] }}</h2>
                        <p class="mt-3 text-sm font-semibold text-brand-600">Para quem é</p>
                        <p class="mt-1 text-muted leading-relaxed">{{ $service['for'] }}</p>
                    </div>
                    <div class="lg:col-span-7">
                        <ul class="space-y-3">
                            @foreach ($service['points'] as $point)
                                <li class="flex gap-3 text-muted">
                                    <span class="mt-2 h-2 w-2 shrink-0 rounded-full bg-brand-500" aria-hidden="true"></span>
                                    <span>{{ $point }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </article>
            @endforeach
        </div>
    </section>

    <section class="relative isolate overflow-hidden py-20">
        <img src="{{ asset('images/marketing/case-links.jpg') }}" alt="" class="absolute inset-0 h-full w-full object-cover" loading="lazy">
        <div class="absolute inset-0 bg-brand-950/88" aria-hidden="true"></div>
        <div class="relative mx-auto max-w-6xl px-4 text-center sm:px-6 lg:px-8">
            <div class="reveal">
                <h2 class="text-3xl font-bold text-white">Tem um desafio digital na mesa?</h2>
                <p class="mx-auto mt-3 max-w-xl text-white/70">
                    Conte o cenário. Montamos um caminho objetivo — site, sistema ou produto.
                </p>
                <div class="mt-8 flex flex-wrap justify-center gap-3">
                    <x-cta-button href="{{ route('contact') }}" variant="on-dark">Solicitar orçamento</x-cta-button>
                    <x-whatsapp-button variant="on-dark" message="Olá! Quero um orçamento dos serviços da DMTA." />
                </div>
            </div>
        </div>
    </section>
@endsection
