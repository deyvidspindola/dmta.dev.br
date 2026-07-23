@extends('layouts.app')

@section('title', 'DMTA — Sites, sistemas e soluções digitais')
@section('meta_description', 'Transformamos ideias em soluções digitais que vendem, organizam e escalam o seu negócio. Sites, sistemas e produtos sob medida.')

@section('content')
    {{-- Hero --}}
    <section class="relative overflow-hidden bg-mesh">
        <div class="pointer-events-none absolute inset-0 bg-hero-grid" aria-hidden="true"></div>
        <div class="relative mx-auto flex min-h-[calc(100vh-4rem)] max-w-6xl flex-col justify-center px-4 py-20 sm:px-6 lg:px-8">
            <p class="font-display text-sm font-bold uppercase tracking-[0.2em] text-brand-500">
                DMTA
            </p>
            <h1 class="mt-4 max-w-3xl text-4xl font-extrabold leading-[1.08] text-brand-950 sm:text-5xl lg:text-6xl text-balance">
                Sites e sistemas que geram resultado de verdade.
            </h1>
            <p class="mt-6 max-w-xl text-lg leading-relaxed text-muted">
                Desenvolvemos soluções digitais sob medida para empresas que precisam de presença online profissional, processos mais ágeis e canais que convertem.
            </p>
            <div class="mt-10 flex flex-wrap gap-3">
                <x-cta-button href="{{ route('contact') }}" size="lg">Solicitar orçamento</x-cta-button>
                <x-whatsapp-button size="lg" message="Olá! Quero um orçamento com a DMTA." />
            </div>
        </div>
    </section>

    {{-- Serviços --}}
    <section class="border-t border-brand-950/5 bg-white py-20">
        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
            <div class="max-w-2xl">
                <h2 class="text-3xl font-bold sm:text-4xl">O que entregamos</h2>
                <p class="mt-3 text-muted">
                    Do site institucional à plataforma completa — com foco em clareza, performance e conversão.
                </p>
            </div>

            <div class="mt-12 grid gap-8 sm:grid-cols-2">
                @foreach ([
                    [
                        'title' => 'Desenvolvimento Web',
                        'text' => 'Sites institucionais e landing pages rápidas, responsivas e pensadas para gerar contato e confiança.',
                    ],
                    [
                        'title' => 'Sistemas personalizados',
                        'text' => 'Ferramentas sob medida para organizar operações, clientes, vagas, pedidos e fluxos do seu negócio.',
                    ],
                    [
                        'title' => 'E-commerce',
                        'text' => 'Lojas online com experiência de compra simples, pagamento seguro e estrutura pronta para crescer.',
                    ],
                    [
                        'title' => 'Manutenção e suporte',
                        'text' => 'Atualizações, correções e evolução contínua para o seu digital não parar — e melhorar com o tempo.',
                    ],
                ] as $service)
                    <article class="border-t border-brand-500/30 pt-6">
                        <h3 class="text-xl font-bold">{{ $service['title'] }}</h3>
                        <p class="mt-3 text-muted leading-relaxed">{{ $service['text'] }}</p>
                    </article>
                @endforeach
            </div>

            <div class="mt-10">
                <x-cta-button href="{{ route('services') }}" variant="secondary">Ver todos os serviços</x-cta-button>
            </div>
        </div>
    </section>

    {{-- Cases --}}
    <section class="border-t border-brand-950/5 bg-surface py-20">
        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
            <div class="max-w-2xl">
                <h2 class="text-3xl font-bold sm:text-4xl">Cases reais</h2>
                <p class="mt-3 text-muted">
                    Produtos digitais publicados e em uso — não mockups de template.
                </p>
            </div>

            <div class="mt-12 grid gap-10 lg:grid-cols-2">
                <article class="relative overflow-hidden rounded-2xl bg-brand-950 p-8 text-white sm:p-10">
                    <p class="text-xs font-bold uppercase tracking-wider text-brand-300">Produto próprio</p>
                    <h3 class="mt-3 text-2xl font-bold text-white">Emprega Paulínia</h3>
                    <p class="mt-4 text-white/75 leading-relaxed">
                        Portal de vagas que conecta empresas e candidatos em Paulínia e região — busca rápida, publicação de oportunidades e conteúdo de carreira.
                    </p>
                    <a
                        href="https://empregapaulinia.com.br"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="mt-8 inline-flex items-center gap-2 text-sm font-bold text-white underline decoration-brand-400 underline-offset-4 hover:decoration-white"
                    >
                        Visitar empregapaulinia.com.br
                        <span aria-hidden="true">→</span>
                    </a>
                </article>

                <article class="relative overflow-hidden rounded-2xl bg-white p-8 ring-1 ring-brand-950/10 sm:p-10">
                    <p class="text-xs font-bold uppercase tracking-wider text-brand-500">Produto próprio</p>
                    <h3 class="mt-3 text-2xl font-bold">Links na Bio</h3>
                    <p class="mt-4 text-muted leading-relaxed">
                        Página de links para negócios locais levarem o visitante direto ao WhatsApp, cardápio ou atendimento — simples, rápida e feita para converter.
                    </p>
                    <a
                        href="https://linksnabio.app.br"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="mt-8 inline-flex items-center gap-2 text-sm font-bold text-brand-600 underline decoration-brand-200 underline-offset-4 hover:decoration-brand-600"
                    >
                        Visitar linksnabio.app.br
                        <span aria-hidden="true">→</span>
                    </a>
                </article>
            </div>

            <div class="mt-10">
                <x-cta-button href="{{ route('cases') }}" variant="secondary">Ver cases</x-cta-button>
            </div>
        </div>
    </section>

    {{-- Processo --}}
    <section class="border-t border-brand-950/5 bg-white py-20">
        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
            <div class="max-w-2xl">
                <h2 class="text-3xl font-bold sm:text-4xl">Como trabalhamos</h2>
                <p class="mt-3 text-muted">Processo claro, do briefing à evolução contínua.</p>
            </div>

            <ol class="mt-12 grid gap-8 sm:grid-cols-2 lg:grid-cols-4">
                @foreach ([
                    ['n' => '01', 't' => 'Descoberta', 'd' => 'Entendemos o negócio, o público e o objetivo comercial do projeto.'],
                    ['n' => '02', 't' => 'Construção', 'd' => 'Design e desenvolvimento com foco em usabilidade e performance.'],
                    ['n' => '03', 't' => 'Entrega', 'd' => 'Publicação, ajustes finais e alinhamento para você começar a usar.'],
                    ['n' => '04', 't' => 'Suporte', 'd' => 'Acompanhamento, melhorias e manutenção quando o projeto precisa evoluir.'],
                ] as $step)
                    <li>
                        <p class="font-display text-sm font-bold text-brand-500">{{ $step['n'] }}</p>
                        <h3 class="mt-2 text-lg font-bold">{{ $step['t'] }}</h3>
                        <p class="mt-2 text-sm leading-relaxed text-muted">{{ $step['d'] }}</p>
                    </li>
                @endforeach
            </ol>
        </div>
    </section>

    {{-- CTA final --}}
    <section class="border-t border-brand-950/5 bg-mesh py-20">
        <div class="mx-auto max-w-6xl px-4 text-center sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold sm:text-4xl text-balance">Pronto para tirar o próximo projeto do papel?</h2>
            <p class="mx-auto mt-4 max-w-xl text-muted">
                Conte o que você precisa. Respondemos com uma proposta objetiva — sem enrolação.
            </p>
            <div class="mt-8 flex flex-wrap justify-center gap-3">
                <x-cta-button href="{{ route('contact') }}" size="lg">Solicitar orçamento</x-cta-button>
                <x-whatsapp-button size="lg" variant="solid" message="Olá! Quero falar com a DMTA sobre um projeto." />
            </div>
        </div>
    </section>
@endsection
