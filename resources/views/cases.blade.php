@extends('layouts.app')

@section('title', 'Cases — DMTA')
@section('meta_description', 'Conheça produtos digitais da DMTA: Emprega Paulínia e Links na Bio — soluções reais em produção.')

@section('content')
    <section class="bg-mesh border-b border-brand-950/5">
        <div class="mx-auto max-w-6xl px-4 py-16 sm:px-6 lg:px-8">
            <p class="text-sm font-bold uppercase tracking-wider text-brand-500">Cases</p>
            <h1 class="mt-3 max-w-3xl text-4xl font-extrabold sm:text-5xl text-balance">
                Produtos digitais publicados e em operação.
            </h1>
            <p class="mt-5 max-w-2xl text-lg text-muted">
                Além de projetos sob demanda, a DMTA também cria e mantém produtos próprios — prova de execução de ponta a ponta.
            </p>
        </div>
    </section>

    <section class="bg-white py-16">
        <div class="mx-auto max-w-6xl space-y-20 px-4 sm:px-6 lg:px-8">
            <article class="grid items-start gap-10 lg:grid-cols-2">
                <div>
                    <p class="text-xs font-bold uppercase tracking-wider text-brand-500">Portal de empregos</p>
                    <h2 class="mt-2 text-3xl font-bold">Emprega Paulínia</h2>
                    <dl class="mt-8 space-y-6">
                        <div>
                            <dt class="text-sm font-bold text-brand-950">Problema</dt>
                            <dd class="mt-1 text-muted leading-relaxed">
                                Empresas e candidatos da região precisavam de um canal local, rápido e confiável para publicar e encontrar vagas — sem depender só de redes sociais genéricas.
                            </dd>
                        </div>
                        <div>
                            <dt class="text-sm font-bold text-brand-950">Solução</dt>
                            <dd class="mt-1 text-muted leading-relaxed">
                                Portal completo com listagem de vagas, busca, anúncios para recrutadores e conteúdo de carreira para candidatos.
                            </dd>
                        </div>
                        <div>
                            <dt class="text-sm font-bold text-brand-950">Resultado</dt>
                            <dd class="mt-1 text-muted leading-relaxed">
                                Plataforma viva, em uso por empresas e candidatos de Paulínia e região — com fluxo claro do anúncio à candidatura.
                            </dd>
                        </div>
                    </dl>
                    <div class="mt-8 flex flex-wrap gap-3">
                        <a
                            href="https://empregapaulinia.com.br"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="inline-flex items-center justify-center rounded-lg bg-brand-500 px-4 py-2.5 text-sm font-bold text-white hover:bg-brand-600"
                        >
                            Abrir empregapaulinia.com.br
                        </a>
                        <x-whatsapp-button message="Olá! Vi o case Emprega Paulínia e quero algo parecido." />
                    </div>
                </div>
                <div class="rounded-2xl bg-brand-950 p-8 text-white sm:p-10">
                    <img src="{{ asset('images/brand/dmta-mark.svg') }}" alt="" class="h-10 w-10 brightness-0 invert" width="48" height="48">
                    <p class="mt-8 font-display text-2xl font-bold leading-snug text-white">
                        “Encontre e publique vagas de emprego em Paulínia e região.”
                    </p>
                    <p class="mt-4 text-sm text-white/60">empregapaulinia.com.br</p>
                </div>
            </article>

            <article class="grid items-start gap-10 border-t border-brand-950/10 pt-20 lg:grid-cols-2">
                <div class="order-2 rounded-2xl bg-surface p-8 ring-1 ring-brand-950/10 sm:p-10 lg:order-1">
                    <img src="{{ asset('images/brand/dmta-mark.svg') }}" alt="" class="h-10 w-10" width="48" height="48">
                    <p class="mt-8 font-display text-2xl font-bold leading-snug text-brand-950">
                        Links que levam o cliente direto ao WhatsApp, cardápio ou atendimento.
                    </p>
                    <p class="mt-4 text-sm text-muted">linksnabio.app.br</p>
                </div>
                <div class="order-1 lg:order-2">
                    <p class="text-xs font-bold uppercase tracking-wider text-brand-500">Link in bio</p>
                    <h2 class="mt-2 text-3xl font-bold">Links na Bio</h2>
                    <dl class="mt-8 space-y-6">
                        <div>
                            <dt class="text-sm font-bold text-brand-950">Problema</dt>
                            <dd class="mt-1 text-muted leading-relaxed">
                                Salões, clínicas, restaurantes e lojas perdiam leads no Instagram com bios confusas e muitos links soltos.
                            </dd>
                        </div>
                        <div>
                            <dt class="text-sm font-bold text-brand-950">Solução</dt>
                            <dd class="mt-1 text-muted leading-relaxed">
                                Página leve de links focada em negócios locais — um destino claro para WhatsApp, cardápio e atendimento.
                            </dd>
                        </div>
                        <div>
                            <dt class="text-sm font-bold text-brand-950">Resultado</dt>
                            <dd class="mt-1 text-muted leading-relaxed">
                                Menos fricção entre a rede social e a conversão: o visitante chega onde o negócio precisa.
                            </dd>
                        </div>
                    </dl>
                    <div class="mt-8 flex flex-wrap gap-3">
                        <a
                            href="https://linksnabio.app.br"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="inline-flex items-center justify-center rounded-lg bg-brand-500 px-4 py-2.5 text-sm font-bold text-white hover:bg-brand-600"
                        >
                            Abrir linksnabio.app.br
                        </a>
                        <x-whatsapp-button message="Olá! Vi o Links na Bio e quero uma solução parecida." />
                    </div>
                </div>
            </article>
        </div>
    </section>

    <section class="border-t border-brand-950/5 bg-mesh py-16">
        <div class="mx-auto max-w-6xl px-4 text-center sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold">Seu próximo case pode ser o próximo lançamento</h2>
            <p class="mx-auto mt-3 max-w-xl text-muted">
                Site, sistema ou produto digital — vamos estruturar juntos.
            </p>
            <div class="mt-8 flex flex-wrap justify-center gap-3">
                <x-cta-button href="{{ route('contact') }}" size="lg">Solicitar orçamento</x-cta-button>
                <x-whatsapp-button size="lg" variant="solid" />
            </div>
        </div>
    </section>
@endsection
