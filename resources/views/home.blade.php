@extends('layouts.app')

@section('title', 'DMTA — Sites, sistemas e soluções digitais')
@section('meta_description', 'Transformamos ideias em soluções digitais que vendem, organizam e escalam o seu negócio. Sites, sistemas e produtos sob medida.')

@section('content')
    {{-- Hero full-bleed --}}
    <section class="relative isolate min-h-[calc(100vh-4rem)] overflow-hidden">
        <img
            src="{{ asset('images/marketing/hero-workspace.jpg') }}"
            alt=""
            class="absolute inset-0 h-full w-full object-cover hero-kenburns"
            width="1920"
            height="1080"
            fetchpriority="high"
        >
        <div class="absolute inset-0 bg-gradient-to-r from-brand-950/92 via-brand-950/78 to-brand-950/45" aria-hidden="true"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-brand-950/70 via-transparent to-brand-950/30" aria-hidden="true"></div>

        <div class="relative mx-auto flex min-h-[calc(100vh-4rem)] max-w-6xl flex-col justify-center px-4 py-24 sm:px-6 lg:px-8">
            <p class="font-display text-sm font-bold uppercase tracking-[0.28em] text-brand-300">
                DMTA
            </p>
            <h1 class="mt-5 max-w-3xl text-4xl font-extrabold leading-[1.05] text-white sm:text-5xl lg:text-6xl text-balance">
                Seu negócio merece um digital que fecha negócio.
            </h1>
            <p class="mt-6 max-w-xl text-lg leading-relaxed text-white/80">
                Sites, sistemas e produtos sob medida — com cara de empresa séria e CTAs que convertem.
            </p>
            <div class="mt-10 flex flex-wrap gap-3">
                <x-cta-button href="{{ route('contact') }}" size="lg" class="shadow-lg shadow-brand-950/40">
                    Solicitar orçamento
                </x-cta-button>
                <x-whatsapp-button size="lg" variant="on-dark" message="Olá! Quero um orçamento com a DMTA." />
            </div>
        </div>
    </section>

    {{-- Serviços --}}
    <section class="bg-white py-24">
        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
            <div class="max-w-2xl reveal">
                <h2 class="text-3xl font-bold sm:text-4xl">O que entregamos</h2>
                <p class="mt-3 text-lg text-muted">
                    Do site que gera lead ao sistema que organiza a operação — sempre com foco em resultado.
                </p>
            </div>

            <div class="mt-14 grid gap-x-10 gap-y-12 sm:grid-cols-2">
                @foreach ([
                    [
                        'title' => 'Desenvolvimento Web',
                        'text' => 'Sites institucionais e landing pages rápidas, com identidade forte e caminho claro até o WhatsApp ou formulário.',
                    ],
                    [
                        'title' => 'Sistemas personalizados',
                        'text' => 'Ferramentas sob medida para vagas, clientes, pedidos e processos — sem forçar planilha ou software genérico.',
                    ],
                    [
                        'title' => 'E-commerce',
                        'text' => 'Lojas online pensadas para vender no celular: catálogo claro, checkout simples e gestão sem dor.',
                    ],
                    [
                        'title' => 'Manutenção e suporte',
                        'text' => 'Seu digital no ar, atualizado e evoluindo — com alguém do outro lado quando precisar.',
                    ],
                ] as $i => $service)
                    <article @class(['reveal', 'reveal-delay-'.(($i % 2) + 1), 'border-l-4 border-brand-500 pl-6'])>
                        <h3 class="text-xl font-bold">{{ $service['title'] }}</h3>
                        <p class="mt-3 leading-relaxed text-muted">{{ $service['text'] }}</p>
                    </article>
                @endforeach
            </div>

            <div class="mt-12 reveal">
                <x-cta-button href="{{ route('services') }}" variant="secondary">Ver todos os serviços</x-cta-button>
            </div>
        </div>
    </section>

    {{-- Cases com imagem --}}
    <section class="overflow-hidden bg-brand-950 py-24 text-white">
        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
            <div class="max-w-2xl reveal">
                <h2 class="text-3xl font-bold text-white sm:text-4xl">Cases reais, no ar</h2>
                <p class="mt-3 text-lg text-white/65">
                    Produtos que gente de verdade usa — não mockups de portfolio genérico.
                </p>
            </div>

            <div class="mt-14 space-y-20">
                <article class="grid items-center gap-10 lg:grid-cols-2">
                    <div class="reveal overflow-hidden rounded-2xl ring-1 ring-white/10">
                        <img
                            src="{{ asset('images/marketing/case-emprega.jpg') }}"
                            alt="Interface de portal de vagas em notebook e celular"
                            class="aspect-[4/3] w-full object-cover transition duration-700 hover:scale-[1.03]"
                            width="1200"
                            height="900"
                            loading="lazy"
                        >
                    </div>
                    <div class="reveal reveal-delay-1">
                        <p class="text-xs font-bold uppercase tracking-[0.2em] text-brand-300">Produto próprio</p>
                        <h3 class="mt-3 text-3xl font-bold text-white">Emprega Paulínia</h3>
                        <p class="mt-4 text-white/70 leading-relaxed">
                            Portal de empregos local: empresas publicam vagas, candidatos encontram oportunidades e o mercado da região ganha um canal próprio — fora do feed bagunçado.
                        </p>
                        <a
                            href="https://empregapaulinia.com.br"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="mt-8 inline-flex items-center gap-2 text-sm font-bold text-white underline decoration-brand-400 underline-offset-4 hover:decoration-white"
                        >
                            Ver empregapaulinia.com.br
                            <span aria-hidden="true">→</span>
                        </a>
                    </div>
                </article>

                <article class="grid items-center gap-10 lg:grid-cols-2">
                    <div class="reveal order-2 lg:order-1">
                        <p class="text-xs font-bold uppercase tracking-[0.2em] text-brand-300">Produto próprio</p>
                        <h3 class="mt-3 text-3xl font-bold text-white">Links na Bio</h3>
                        <p class="mt-4 text-white/70 leading-relaxed">
                            Página de links para salões, clínicas e negócios locais levarem o visitante direto ao WhatsApp, cardápio ou atendimento — sem perder o lead no caminho.
                        </p>
                        <a
                            href="https://linksnabio.app.br"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="mt-8 inline-flex items-center gap-2 text-sm font-bold text-white underline decoration-brand-400 underline-offset-4 hover:decoration-white"
                        >
                            Ver linksnabio.app.br
                            <span aria-hidden="true">→</span>
                        </a>
                    </div>
                    <div class="reveal reveal-delay-1 order-1 mx-auto w-full max-w-sm overflow-hidden rounded-2xl ring-1 ring-white/10 lg:order-2 lg:mx-0 lg:max-w-none">
                        <img
                            src="{{ asset('images/marketing/case-links.jpg') }}"
                            alt="Celular com página de links na bio"
                            class="aspect-[3/4] w-full object-cover transition duration-700 hover:scale-[1.03] lg:aspect-[4/3]"
                            width="900"
                            height="1200"
                            loading="lazy"
                        >
                    </div>
                </article>
            </div>

            <div class="mt-14 reveal">
                <x-cta-button href="{{ route('cases') }}" variant="on-dark">Ver todos os cases</x-cta-button>
            </div>
        </div>
    </section>

    {{-- Processo --}}
    <section class="bg-mesh py-24">
        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
            <div class="max-w-2xl reveal">
                <h2 class="text-3xl font-bold sm:text-4xl">Como trabalhamos</h2>
                <p class="mt-3 text-lg text-muted">Processo claro, do briefing ao suporte — sem surpresa no meio do caminho.</p>
            </div>

            <ol class="mt-14 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                @foreach ([
                    ['n' => '01', 't' => 'Descoberta', 'd' => 'Entendemos o negócio, o público e o que precisa converter.'],
                    ['n' => '02', 't' => 'Construção', 'd' => 'Design e código com foco em clareza, velocidade e uso real.'],
                    ['n' => '03', 't' => 'Entrega', 'd' => 'Publicação, ajustes finais e você no comando do resultado.'],
                    ['n' => '04', 't' => 'Suporte', 'd' => 'Evolução contínua quando o projeto precisa crescer.'],
                ] as $i => $step)
                    <li @class(['reveal', 'reveal-delay-'.min($i + 1, 3), 'rounded-2xl bg-white/80 p-6 ring-1 ring-brand-950/10 backdrop-blur-sm'])>
                        <p class="font-display text-3xl font-extrabold text-brand-500/30">{{ $step['n'] }}</p>
                        <h3 class="mt-3 text-lg font-bold">{{ $step['t'] }}</h3>
                        <p class="mt-2 text-sm leading-relaxed text-muted">{{ $step['d'] }}</p>
                    </li>
                @endforeach
            </ol>
        </div>
    </section>

    {{-- CTA final com atmosfera --}}
    <section class="relative isolate overflow-hidden py-28">
        <img
            src="{{ asset('images/marketing/hero-workspace.jpg') }}"
            alt=""
            class="absolute inset-0 h-full w-full object-cover object-center"
            loading="lazy"
        >
        <div class="absolute inset-0 bg-brand-950/88" aria-hidden="true"></div>
        <div class="relative mx-auto max-w-3xl px-4 text-center sm:px-6 lg:px-8">
            <div class="reveal">
                <p class="font-display text-sm font-bold uppercase tracking-[0.24em] text-brand-300">DMTA</p>
                <h2 class="mt-4 text-3xl font-bold text-white sm:text-4xl text-balance">
                    Pronto para um site que transmite confiança — e pede o próximo passo?
                </h2>
                <p class="mx-auto mt-4 max-w-xl text-white/70">
                    Conte o que você precisa. Montamos uma proposta objetiva e começamos pelo que gera resultado.
                </p>
                <div class="mt-10 flex flex-wrap justify-center gap-3">
                    <x-cta-button href="{{ route('contact') }}" size="lg">Solicitar orçamento</x-cta-button>
                    <x-whatsapp-button size="lg" variant="solid" message="Olá! Quero falar com a DMTA sobre um projeto." />
                </div>
            </div>
        </div>
    </section>
@endsection
