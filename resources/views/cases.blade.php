@extends('layouts.app')

@section('title', 'Cases — DMTA')
@section('meta_description', 'Conheça produtos digitais da DMTA: Emprega Paulínia e Links na Bio — soluções reais em produção.')

@section('content')
    <section class="relative isolate overflow-hidden">
        <img
            src="{{ asset('images/marketing/case-emprega.jpg') }}"
            alt=""
            class="absolute inset-0 h-full w-full object-cover"
        >
        <div class="absolute inset-0 bg-brand-950/85" aria-hidden="true"></div>
        <div class="relative mx-auto max-w-6xl px-4 py-24 sm:px-6 lg:px-8">
            <p class="font-display text-sm font-bold uppercase tracking-[0.24em] text-brand-300">Cases</p>
            <h1 class="mt-4 max-w-3xl text-4xl font-extrabold text-white sm:text-5xl text-balance">
                Produtos digitais publicados e em operação.
            </h1>
            <p class="mt-5 max-w-2xl text-lg text-white/75">
                Prova de execução de ponta a ponta — do briefing ao usuário final.
            </p>
        </div>
    </section>

    <section class="bg-white py-20">
        <div class="mx-auto max-w-6xl space-y-24 px-4 sm:px-6 lg:px-8">
            <article class="grid items-center gap-12 lg:grid-cols-2">
                <div class="reveal overflow-hidden rounded-2xl shadow-xl shadow-brand-950/10 ring-1 ring-brand-950/10">
                    <img
                        src="{{ asset('images/marketing/case-emprega.jpg') }}"
                        alt="Emprega Paulínia em notebook e celular"
                        class="aspect-[4/3] w-full object-cover"
                        loading="lazy"
                    >
                </div>
                <div class="reveal reveal-delay-1">
                    <p class="text-xs font-bold uppercase tracking-[0.2em] text-brand-500">Portal de empregos</p>
                    <h2 class="mt-2 text-3xl font-bold">Emprega Paulínia</h2>
                    <dl class="mt-8 space-y-6">
                        <div>
                            <dt class="text-sm font-bold text-brand-950">Problema</dt>
                            <dd class="mt-1 text-muted leading-relaxed">
                                Empresas e candidatos da região precisavam de um canal local, rápido e confiável — sem depender só de grupos e posts soltos.
                            </dd>
                        </div>
                        <div>
                            <dt class="text-sm font-bold text-brand-950">Solução</dt>
                            <dd class="mt-1 text-muted leading-relaxed">
                                Portal completo com vagas, busca, anúncios para recrutadores e conteúdo de carreira.
                            </dd>
                        </div>
                        <div>
                            <dt class="text-sm font-bold text-brand-950">Resultado</dt>
                            <dd class="mt-1 text-muted leading-relaxed">
                                Plataforma viva em Paulínia e região, com fluxo claro do anúncio à candidatura.
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
                            Abrir site
                        </a>
                        <x-whatsapp-button message="Olá! Vi o case Emprega Paulínia e quero algo parecido." />
                    </div>
                </div>
            </article>

            <article class="grid items-center gap-12 border-t border-brand-950/10 pt-24 lg:grid-cols-2">
                <div class="reveal order-2 lg:order-1">
                    <p class="text-xs font-bold uppercase tracking-[0.2em] text-brand-500">Link in bio</p>
                    <h2 class="mt-2 text-3xl font-bold">Links na Bio</h2>
                    <dl class="mt-8 space-y-6">
                        <div>
                            <dt class="text-sm font-bold text-brand-950">Problema</dt>
                            <dd class="mt-1 text-muted leading-relaxed">
                                Negócios locais perdiam leads no Instagram com bios confusas e links demais.
                            </dd>
                        </div>
                        <div>
                            <dt class="text-sm font-bold text-brand-950">Solução</dt>
                            <dd class="mt-1 text-muted leading-relaxed">
                                Página leve focada em um destino: WhatsApp, cardápio ou atendimento.
                            </dd>
                        </div>
                        <div>
                            <dt class="text-sm font-bold text-brand-950">Resultado</dt>
                            <dd class="mt-1 text-muted leading-relaxed">
                                Menos fricção entre a rede social e a conversão.
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
                            Abrir site
                        </a>
                        <x-whatsapp-button message="Olá! Vi o Links na Bio e quero uma solução parecida." />
                    </div>
                </div>
                <div class="reveal reveal-delay-1 order-1 overflow-hidden rounded-2xl shadow-xl shadow-brand-950/10 ring-1 ring-brand-950/10 lg:order-2">
                    <img
                        src="{{ asset('images/marketing/case-links.jpg') }}"
                        alt="Links na Bio no celular"
                        class="aspect-[3/4] w-full object-cover sm:aspect-[4/3]"
                        loading="lazy"
                    >
                </div>
            </article>
        </div>
    </section>

    <section class="relative isolate overflow-hidden py-24">
        <img src="{{ asset('images/marketing/hero-workspace.jpg') }}" alt="" class="absolute inset-0 h-full w-full object-cover" loading="lazy">
        <div class="absolute inset-0 bg-brand-950/88" aria-hidden="true"></div>
        <div class="relative mx-auto max-w-6xl px-4 text-center sm:px-6 lg:px-8">
            <div class="reveal">
                <h2 class="text-3xl font-bold text-white">Seu próximo case pode ser o próximo lançamento</h2>
                <p class="mx-auto mt-3 max-w-xl text-white/70">Site, sistema ou produto digital — vamos estruturar juntos.</p>
                <div class="mt-8 flex flex-wrap justify-center gap-3">
                    <x-cta-button href="{{ route('contact') }}" size="lg">Solicitar orçamento</x-cta-button>
                    <x-whatsapp-button size="lg" variant="solid" />
                </div>
            </div>
        </div>
    </section>
@endsection
