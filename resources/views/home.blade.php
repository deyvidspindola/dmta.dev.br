@extends('layouts.app')

@section('title', 'DMTA — Sites e sistemas sob medida')
@section('meta_description', 'A DMTA cria sites institucionais e sistemas sob medida para negócios reais. Solicite um orçamento ou fale no WhatsApp.')

@section('content')
    {{-- Hero --}}
    <section id="inicio" class="relative isolate min-h-[calc(100vh-4rem)] overflow-hidden scroll-mt-16">
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
            <p class="font-display text-sm font-bold uppercase tracking-[0.28em] text-brand-300">DMTA</p>
            <h1 class="mt-5 max-w-3xl text-4xl font-extrabold leading-[1.05] text-white sm:text-5xl lg:text-6xl text-balance">
                Seu negócio merece um digital que fecha negócio.
            </h1>
            <p class="mt-6 max-w-xl text-lg leading-relaxed text-white/80">
                Sites e sistemas sob medida — do jeito que seu negócio já funciona, não do jeito que o software genérico obriga.
            </p>
            <div class="mt-10 flex flex-wrap gap-3">
                <x-cta-button href="#contato" size="lg" class="shadow-lg shadow-brand-950/40">
                    Solicitar orçamento
                </x-cta-button>
                <x-whatsapp-button size="lg" variant="on-dark" message="Olá! Quero um orçamento com a DMTA." />
            </div>
        </div>
    </section>

    {{-- Serviços --}}
    <section id="servicos" class="scroll-mt-16 bg-white py-20 sm:py-24">
        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
            <div class="max-w-2xl reveal">
                <h2 class="text-3xl font-bold sm:text-4xl">O que entregamos</h2>
                <p class="mt-3 text-lg text-muted">
                    Quatro frentes claras — entrega concreta, sem pacote genérico.
                </p>
            </div>

            <div class="mt-12 grid gap-x-10 gap-y-10 sm:grid-cols-2">
                @foreach ([
                    ['title' => 'Desenvolvimento Web', 'text' => 'Sites e landing pages rápidos, com identidade própria e caminho claro até WhatsApp ou formulário.'],
                    ['title' => 'Sistemas personalizados', 'text' => 'Painéis e fluxos sob medida para a operação — sem adaptar o negócio a um ERP engessado.'],
                    ['title' => 'E-commerce', 'text' => 'Loja pensada para vender no celular: catálogo, carrinho, checkout e gestão sem fricção.'],
                    ['title' => 'Manutenção e suporte', 'text' => 'Correções, atualizações e evoluções depois do go-live — com quem já conhece o código.'],
                ] as $i => $service)
                    <article @class(['reveal', 'reveal-delay-'.(($i % 2) + 1), 'border-l-4 border-brand-500 pl-6'])>
                        <h3 class="text-xl font-bold">{{ $service['title'] }}</h3>
                        <p class="mt-3 leading-relaxed text-muted">{{ $service['text'] }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Cases --}}
    <section id="cases" class="scroll-mt-16 overflow-hidden bg-brand-950 py-20 text-white sm:py-24">
        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
            <div class="max-w-2xl reveal">
                <h2 class="text-3xl font-bold text-white sm:text-4xl">Projetos em produção</h2>
                <p class="mt-3 text-lg text-white/65">
                    Prova real — não mockup de portfolio genérico.
                </p>
            </div>

            <div class="mt-14 space-y-16">
                <article class="grid items-center gap-10 lg:grid-cols-2">
                    <div class="reveal space-y-4">
                        <img
                            src="{{ asset('images/cases/emprega-desktop.jpg') }}"
                            alt="Print do Emprega Paulínia — portal de vagas"
                            class="w-full rounded-xl ring-1 ring-white/10"
                            width="1024"
                            height="482"
                            loading="lazy"
                        >
                    </div>
                    <div class="reveal reveal-delay-1">
                        <p class="text-xs font-bold uppercase tracking-[0.2em] text-brand-300">Plataforma web / marketplace de vagas</p>
                        <h3 class="mt-3 text-3xl font-bold text-white">Emprega Paulínia</h3>
                        <p class="mt-4 text-white/70 leading-relaxed">
                            <span class="font-semibold text-white">Problema:</span> conectar candidatos e empresas da região sem a fricção de portais genéricos.
                        </p>
                        <p class="mt-3 text-white/70 leading-relaxed">
                            <span class="font-semibold text-white">O que foi construído:</span> portal com vagas, busca, cadastro e conteúdo de carreira — em uso em Paulínia e região.
                        </p>
                        <a
                            href="https://empregapaulinia.com.br"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="mt-8 inline-flex items-center gap-2 text-sm font-bold text-white underline decoration-brand-400 underline-offset-4 hover:decoration-white"
                        >
                            Visitar site →
                        </a>
                    </div>
                </article>

                <article class="grid items-center gap-10 lg:grid-cols-2">
                    <div class="reveal order-2 lg:order-1">
                        <p class="text-xs font-bold uppercase tracking-[0.2em] text-brand-300">Produto SaaS / multi-cliente</p>
                        <h3 class="mt-3 text-3xl font-bold text-white">Links na Bio</h3>
                        <p class="mt-4 text-white/70 leading-relaxed">
                            <span class="font-semibold text-white">Problema:</span> negócios locais perdiam leads no Instagram com bios confusas e apps de terceiro.
                        </p>
                        <p class="mt-3 text-white/70 leading-relaxed">
                            <span class="font-semibold text-white">O que foi construído:</span> plataforma multi-tenant com editor visual, domínio próprio e atualização remota.
                        </p>
                        <a
                            href="https://linksnabio.app.br"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="mt-8 inline-flex items-center gap-2 text-sm font-bold text-white underline decoration-brand-400 underline-offset-4 hover:decoration-white"
                        >
                            Visitar site →
                        </a>
                    </div>
                    <div class="reveal reveal-delay-1 order-1 lg:order-2">
                        <img
                            src="{{ asset('images/cases/linksnabio-desktop.jpg') }}"
                            alt="Print do Links na Bio — landing e vitrine"
                            class="w-full rounded-xl ring-1 ring-white/10"
                            width="1024"
                            height="480"
                            loading="lazy"
                        >
                    </div>
                </article>
            </div>
        </div>
    </section>

    {{-- Processo + diferencial curto --}}
    <section id="processo" class="scroll-mt-16 bg-mesh py-20 sm:py-24">
        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
            <div class="max-w-2xl reveal">
                <h2 class="text-3xl font-bold sm:text-4xl">Como trabalhamos</h2>
                <p class="mt-3 text-lg text-muted">
                    Sistema sob medida (você não se adapta à ferramenta), fala direta com quem desenvolve e suporte depois do go-live.
                </p>
            </div>

            <ol class="mt-12 grid gap-6 sm:grid-cols-3">
                @foreach ([
                    ['n' => '01', 't' => 'Planejamento', 'd' => 'Levantamos o processo real, o objetivo comercial e o que entra na primeira entrega.'],
                    ['n' => '02', 't' => 'Desenvolvimento', 'd' => 'Design e código em ciclos curtos, com prévias para você validar no caminho.'],
                    ['n' => '03', 't' => 'Entrega e suporte', 'd' => 'Publicação, ajustes finos e evolução contínua conforme o uso real.'],
                ] as $i => $step)
                    <li @class(['reveal', 'reveal-delay-'.min($i + 1, 3)])>
                        <p class="font-display text-3xl font-extrabold text-brand-500/30">{{ $step['n'] }}</p>
                        <h3 class="mt-2 text-lg font-bold">{{ $step['t'] }}</h3>
                        <p class="mt-2 text-sm leading-relaxed text-muted">{{ $step['d'] }}</p>
                    </li>
                @endforeach
            </ol>
        </div>
    </section>

    {{-- Contato --}}
    <section id="contato" class="scroll-mt-16 border-t border-brand-950/5 bg-white py-20 sm:py-24">
        <div class="mx-auto grid max-w-6xl gap-12 px-4 sm:px-6 lg:grid-cols-12 lg:px-8">
            <div class="reveal lg:col-span-5">
                <h2 class="text-3xl font-bold sm:text-4xl">Solicite um orçamento</h2>
                <p class="mt-4 text-muted leading-relaxed">
                    Conte o que você precisa. Respondemos com o próximo passo — objetivo, sem enrolação.
                </p>
                <ul class="mt-8 space-y-4 text-sm">
                    <li>
                        <p class="font-semibold text-brand-950">WhatsApp</p>
                        <x-whatsapp-button class="mt-2" message="Olá! Vim pelo site da DMTA e quero um orçamento." />
                    </li>
                    <li>
                        <p class="font-semibold text-brand-950">E-mail</p>
                        <a class="mt-1 inline-block text-brand-600 hover:underline" href="mailto:{{ config('dmta.contact_email') }}">
                            {{ config('dmta.contact_email') }}
                        </a>
                    </li>
                    <li>
                        <p class="font-semibold text-brand-950">Telefone</p>
                        <a class="mt-1 inline-block text-brand-600 hover:underline" href="tel:{{ config('dmta.phone_tel') }}">
                            {{ config('dmta.phone_display') }}
                        </a>
                    </li>
                </ul>
            </div>

            <div class="reveal reveal-delay-1 lg:col-span-7">
                <form
                    id="contact-form"
                    action="{{ route('contact.store') }}"
                    method="POST"
                    class="relative rounded-2xl bg-surface p-6 ring-1 ring-brand-950/10 sm:p-8"
                    novalidate
                >
                    @csrf

                    <div class="pointer-events-none absolute -left-[9999px] h-0 w-0 overflow-hidden opacity-0" aria-hidden="true">
                        <label for="website">Website</label>
                        <input type="text" name="website" id="website" tabindex="-1" autocomplete="off">
                    </div>

                    @if (session('success'))
                        <div
                            data-form-feedback
                            data-flash
                            class="mb-6 rounded-lg border border-brand-200 bg-brand-50 px-4 py-3 text-sm font-medium text-brand-800"
                            role="status"
                        >
                            {{ session('success') }}
                        </div>
                    @elseif (session('error'))
                        <div
                            data-form-feedback
                            data-flash
                            class="mb-6 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm font-medium text-red-800"
                            role="alert"
                        >
                            {{ session('error') }}
                        </div>
                    @elseif ($errors->any())
                        <div
                            data-form-feedback
                            data-flash
                            class="mb-6 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-800"
                            role="alert"
                        >
                            Confira os campos destacados e tente novamente.
                        </div>
                    @else
                        <div data-form-feedback class="mb-6 hidden rounded-lg border px-4 py-3 text-sm" role="status"></div>
                    @endif

                    <div class="grid gap-5 sm:grid-cols-2">
                        <div class="sm:col-span-2">
                            <label for="name" class="block text-sm font-semibold text-brand-950">Nome</label>
                            <input
                                type="text"
                                name="name"
                                id="name"
                                value="{{ old('name') }}"
                                required
                                autocomplete="name"
                                maxlength="120"
                                class="mt-1.5 w-full rounded-lg border border-brand-950/10 bg-white px-3 py-2.5 text-sm outline-none ring-brand-500 focus:ring-2 @error('name') border-red-400 @enderror"
                            >
                            <p data-error-for="name" class="mt-1 text-xs text-red-600 @error('name') @else hidden @enderror">
                                @error('name') {{ $message }} @enderror
                            </p>
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-semibold text-brand-950">E-mail</label>
                            <input
                                type="email"
                                name="email"
                                id="email"
                                value="{{ old('email') }}"
                                required
                                autocomplete="email"
                                inputmode="email"
                                maxlength="180"
                                class="mt-1.5 w-full rounded-lg border border-brand-950/10 bg-white px-3 py-2.5 text-sm outline-none ring-brand-500 focus:ring-2 @error('email') border-red-400 @enderror"
                            >
                            <p data-error-for="email" class="mt-1 text-xs text-red-600 @error('email') @else hidden @enderror">
                                @error('email') {{ $message }} @enderror
                            </p>
                        </div>

                        <div>
                            <label for="phone" class="block text-sm font-semibold text-brand-950">WhatsApp</label>
                            <input
                                type="tel"
                                name="phone"
                                id="phone"
                                value="{{ old('phone') }}"
                                autocomplete="tel"
                                inputmode="numeric"
                                maxlength="15"
                                placeholder="(19) 99999-9999"
                                class="mt-1.5 w-full rounded-lg border border-brand-950/10 bg-white px-3 py-2.5 text-sm outline-none ring-brand-500 focus:ring-2 @error('phone') border-red-400 @enderror"
                            >
                            <p data-error-for="phone" class="mt-1 text-xs text-red-600 @error('phone') @else hidden @enderror">
                                @error('phone') {{ $message }} @enderror
                            </p>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="project_type" class="block text-sm font-semibold text-brand-950">O que você precisa</label>
                            <select
                                name="project_type"
                                id="project_type"
                                required
                                class="mt-1.5 w-full rounded-lg border border-brand-950/10 bg-white px-3 py-2.5 text-sm outline-none ring-brand-500 focus:ring-2 @error('project_type') border-red-400 @enderror"
                            >
                                <option value="" disabled @selected(old('project_type') === null || old('project_type') === '')>Selecione</option>
                                @foreach (['Site institucional', 'Sistema sob medida', 'E-commerce', 'Manutenção / suporte', 'Outro'] as $type)
                                    <option value="{{ $type }}" @selected(old('project_type') === $type)>{{ $type }}</option>
                                @endforeach
                            </select>
                            <p data-error-for="project_type" class="mt-1 text-xs text-red-600 @error('project_type') @else hidden @enderror">
                                @error('project_type') {{ $message }} @enderror
                            </p>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="message" class="block text-sm font-semibold text-brand-950">Mensagem</label>
                            <textarea
                                name="message"
                                id="message"
                                rows="4"
                                required
                                maxlength="5000"
                                class="mt-1.5 w-full rounded-lg border border-brand-950/10 bg-white px-3 py-2.5 text-sm outline-none ring-brand-500 focus:ring-2 @error('message') border-red-400 @enderror"
                            >{{ old('message') }}</textarea>
                            <p data-error-for="message" class="mt-1 text-xs text-red-600 @error('message') @else hidden @enderror">
                                @error('message') {{ $message }} @enderror
                            </p>
                        </div>
                    </div>

                    @if (config('services.recaptcha.site_key'))
                        <div class="mt-6">
                            <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}"></div>
                            <p data-error-for="g-recaptcha-response" class="mt-1 text-xs text-red-600 @error('g-recaptcha-response') @else hidden @enderror">
                                @error('g-recaptcha-response') {{ $message }} @enderror
                            </p>
                        </div>
                    @endif

                    <button
                        type="submit"
                        class="mt-6 inline-flex w-full items-center justify-center rounded-lg bg-brand-500 px-5 py-2.5 text-sm font-bold text-white transition hover:bg-brand-600 disabled:cursor-not-allowed disabled:opacity-70 sm:w-auto"
                    >
                        Solicitar orçamento
                    </button>
                </form>
            </div>
        </div>
    </section>
@endsection
