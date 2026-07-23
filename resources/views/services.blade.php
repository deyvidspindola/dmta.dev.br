@extends('layouts.app')

@section('title', 'Serviços — DMTA')
@section('meta_description', 'Desenvolvimento web, sistemas personalizados, e-commerce e manutenção. Soluções digitais sob medida pela DMTA.')

@section('content')
    <section class="bg-mesh border-b border-brand-950/5">
        <div class="mx-auto max-w-6xl px-4 py-16 sm:px-6 lg:px-8">
            <p class="text-sm font-bold uppercase tracking-wider text-brand-500">Serviços</p>
            <h1 class="mt-3 max-w-3xl text-4xl font-extrabold sm:text-5xl text-balance">
                Soluções digitais pensadas para vender e operar melhor.
            </h1>
            <p class="mt-5 max-w-2xl text-lg text-muted">
                Cada projeto começa pelo resultado que você precisa: mais contatos, mais organização ou um produto digital próprio.
            </p>
            <div class="mt-8 flex flex-wrap gap-3">
                <x-cta-button href="{{ route('contact') }}">Solicitar orçamento</x-cta-button>
                <x-whatsapp-button message="Olá! Quero saber mais sobre os serviços da DMTA." />
            </div>
        </div>
    </section>

    <section class="bg-white py-16">
        <div class="mx-auto max-w-6xl space-y-16 px-4 sm:px-6 lg:px-8">
            @foreach ([
                [
                    'title' => 'Desenvolvimento Web',
                    'for' => 'Empresas, profissionais e negócios locais que precisam de presença online profissional.',
                    'points' => [
                        'Sites institucionais e landing pages de alta conversão',
                        'Layout responsivo, rápido e alinhado à sua marca',
                        'CTAs claros para WhatsApp, formulário e telefone',
                        'SEO técnico básico e estrutura pronta para evoluir',
                    ],
                ],
                [
                    'title' => 'Sistemas personalizados',
                    'for' => 'Negócios com processos manuais, planilhas ou ferramentas genéricas que não resolvem.',
                    'points' => [
                        'Painéis e fluxos sob medida para a sua operação',
                        'Integração com o jeito que sua equipe já trabalha',
                        'Controle de dados, permissões e relatórios',
                        'Base sólida para crescer sem reinventar tudo depois',
                    ],
                ],
                [
                    'title' => 'E-commerce',
                    'for' => 'Marcas e lojas que querem vender online com confiança e autonomia.',
                    'points' => [
                        'Catálogo, carrinho e checkout pensados para conversão',
                        'Experiência móvel fluida',
                        'Gestão simples de produtos e pedidos',
                        'Estrutura pronta para campanhas e crescimento',
                    ],
                ],
                [
                    'title' => 'Manutenção e suporte',
                    'for' => 'Quem já tem site ou sistema e precisa de estabilidade e evolução contínua.',
                    'points' => [
                        'Correções, atualizações e melhorias pontuais',
                        'Monitoramento e ajustes de performance',
                        'Pequenas evoluções sem projeto do zero',
                        'Canal direto para priorizar o que importa',
                    ],
                ],
            ] as $service)
                <article class="grid gap-8 border-t border-brand-950/10 pt-12 lg:grid-cols-12">
                    <div class="lg:col-span-5">
                        <h2 class="text-2xl font-bold sm:text-3xl">{{ $service['title'] }}</h2>
                        <p class="mt-3 text-sm font-semibold text-brand-600">Para quem é</p>
                        <p class="mt-1 text-muted leading-relaxed">{{ $service['for'] }}</p>
                    </div>
                    <div class="lg:col-span-7">
                        <ul class="space-y-3">
                            @foreach ($service['points'] as $point)
                                <li class="flex gap-3 text-muted">
                                    <span class="mt-1.5 h-1.5 w-1.5 shrink-0 rounded-full bg-brand-500" aria-hidden="true"></span>
                                    <span>{{ $point }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </article>
            @endforeach
        </div>
    </section>

    <section class="border-t border-brand-950/5 bg-brand-950 py-16 text-white">
        <div class="mx-auto max-w-6xl px-4 text-center sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-white">Tem um desafio digital na mesa?</h2>
            <p class="mx-auto mt-3 max-w-xl text-white/70">
                Conte o cenário. Montamos um caminho objetivo — site, sistema ou produto.
            </p>
            <div class="mt-8 flex flex-wrap justify-center gap-3">
                <x-cta-button href="{{ route('contact') }}" variant="on-dark">
                    Solicitar orçamento
                </x-cta-button>
                <x-whatsapp-button variant="on-dark" message="Olá! Quero um orçamento dos serviços da DMTA." />
            </div>
        </div>
    </section>
@endsection
