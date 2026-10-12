@extends('layouts.app')
@section('title', 'DMTA — Desenvolvimento web para empresas')
@section('meta_description', 'Sites, sistemas e integrações para pequenas e médias empresas. Conheça o trabalho da DMTA e converse sobre o seu projeto.')
@section('content')
<div class="dmta-page">
<section id="inicio" class="hero-v3">
    <div class="site-width">
        <div class="hero-caption"><span>Sites / Sistemas / Integrações</span><span>DMTA — Paulínia, SP</span></div>
        <div class="hero-layout">
            <h1>Desenvolvimento<br>web para<br><span>empresas.</span></h1>
            <div class="hero-message"><p>Seu site precisa apresentar bem o seu negócio. Seu sistema precisa facilitar o trabalho.</p><p>A DMTA desenvolve soluções web para pequenas e médias empresas, com contato direto do planejamento à entrega.</p><a href="#contato" class="solid-link">Vamos falar do seu projeto <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 12h14m-6-6 6 6-6 6"/></svg></a></div>
        </div>
        <div class="hero-bottom"><span>Desenvolvimento sob medida.<br>Para necessidades reais.</span><a href="#cases">Conheça os projetos <span aria-hidden="true">↓</span></a></div>
    </div>
</section>

<section id="cases" class="work-v3 site-width">
    <div class="section-top"><p class="section-label">O trabalho na prática</p><h2>Projetos<br>desenvolvidos<span class="heading-dot">.</span></h2></div>
    @foreach ([
        ['name' => 'Emprega Paulínia', 'category' => 'Portal de empregos', 'url' => 'https://empregapaulinia.com.br', 'image' => 'emprega-desktop-2026-10-11.jpg', 'width' => 1265, 'height' => 712, 'alt' => 'Portal Emprega Paulínia com busca e publicação de vagas', 'description' => 'Um portal dedicado às oportunidades de Paulínia e região. Reúne vagas, busca e cadastro para aproximar candidatos e empresas.', 'scope' => ['Busca de vagas', 'Cadastro', 'Conteúdo de carreira']],
        ['name' => 'Links na Bio', 'category' => 'Plataforma de páginas personalizadas', 'url' => 'https://linksnabio.app.br', 'image' => 'linksnabio-desktop-2026-10-11.jpg', 'width' => 1425, 'height' => 891, 'alt' => 'Interface da plataforma Links na Bio', 'description' => 'Uma plataforma para criar páginas com a identidade de cada negócio. Reúne apresentação, conteúdo e canais de contato, com editor para atualizar a página e opção de domínio próprio.', 'scope' => ['Editor visual', 'Página personalizada', 'Domínio próprio']]
    ] as $project)
    <article class="case-sheet case-{{ $loop->iteration }}">
        <div class="case-head"><h3>{{ $project['name'] }}</h3><span>{{ $project['category'] }}</span><span class="case-number" aria-hidden="true">0{{ $loop->iteration }}</span></div>
        <div class="case-body"><a href="{{ $project['url'] }}" target="_blank" rel="noopener noreferrer" aria-label="Visitar {{ $project['name'] }} (abre em nova aba)" class="case-image"><img src="{{ asset('images/cases/'.$project['image']) }}" alt="{{ $project['alt'] }}" width="{{ $project['width'] }}" height="{{ $project['height'] }}" loading="lazy"></a><div class="case-details"><p>{{ $project['description'] }}</p><ul aria-label="Funcionalidades">@foreach ($project['scope'] as $scope)<li>{{ $scope }}</li>@endforeach</ul><a href="{{ $project['url'] }}" target="_blank" rel="noopener noreferrer" class="plain-link">Abrir o projeto <span aria-hidden="true">↗︎</span></a></div></div>
    </article>
    @endforeach
</section>

<section id="servicos" class="services-v3"><div class="site-width"><div class="services-intro"><p class="section-label">O que podemos construir</p><h2>O que falta<br>na sua operação?</h2><p>Uma presença melhor na web, um processo mais organizado ou ferramentas que trabalhem juntas.</p></div><div class="service-rows">
    @foreach ([['Sites & lojas', 'Para apresentar sua empresa e facilitar o contato ou a compra.', 'Sites institucionais, landing pages e e-commerce com conteúdo organizado e navegação pensada para computador e celular.'], ['Sistemas web', 'Para centralizar informações e acompanhar os processos.', 'Painéis de gestão, cadastros, relatórios e fluxos de trabalho definidos a partir da rotina da empresa.'], ['Integrações & suporte', 'Para conectar ferramentas e cuidar da continuidade.', 'Integrações com APIs, correções, atualizações e novas funcionalidades, com escopo e condições combinados para o projeto.']] as $service)
    <details @if($loop->first) open @endif><summary><span class="service-index">0{{ $loop->iteration }}</span><span class="service-title">{{ $service[0] }}</span><span class="service-toggle" aria-hidden="true">+</span></summary><div class="service-content"><h3>{{ $service[1] }}</h3><p>{{ $service[2] }}</p></div></details>
    @endforeach
</div></div></section>

<section id="sobre" class="about-v3 site-width"><div class="about-title"><p class="section-label">A DMTA</p><h2>Você conhece<br>quem desenvolve.</h2></div><div class="about-description"><p class="about-lead">Desenvolvemos sites e sistemas web para pequenas e médias empresas, com soluções pensadas para a rotina de cada negócio.</p><p>A DMTA é conduzida por Deyvid, desenvolvedor responsável pelos projetos. O contato é direto, para que você acompanhe o trabalho e participe das decisões, do planejamento à entrega.</p><div class="developer-line"><span>Deyvid</span><span>Desenvolvedor responsável</span></div></div></section>

<section id="processo" class="process-v3 site-width"><div class="section-top"><p class="section-label">Como trabalhamos</p><h2>Da conversa<br>à entrega.</h2></div><ol class="process-steps">
    @foreach ([['Entender', 'Conversamos sobre a empresa, os objetivos e o que precisa ser resolvido.'], ['Definir', 'Alinhamos as funcionalidades, as etapas e o escopo da proposta.'], ['Construir', 'Você acompanha as prévias e valida decisões durante o desenvolvimento.'], ['Entregar', 'Publicamos e orientamos o uso. Suporte e evolução são combinados.']] as $step)
    <li><span class="step-index">0{{ $loop->iteration }}</span><h3>{{ $step[0] }}</h3><p>{{ $step[1] }}</p></li>
    @endforeach
</ol></section>

<section id="contato" class="contact-v3"><div class="site-width contact-grid"><div class="contact-copy"><p class="section-label">Seu próximo projeto</p><h2>Vamos<br>conversar<span>?</span></h2><p>Conte o que sua empresa precisa. Pode ser uma ideia nova ou um processo que você quer melhorar.</p><x-whatsapp-button class="studio-whatsapp" label="Conversar pelo WhatsApp" message="Olá! Quero conversar sobre um projeto com a DMTA." /><a class="contact-email" href="mailto:{{ config('dmta.contact_email') }}">{{ config('dmta.contact_email') }}</a></div><div class="contact-form-wrap">                <form
                    id="contact-form"
                    action="{{ route('contact.store') }}"
                    method="POST"
                    class="contact-sheet"
                    novalidate
                >
                    @csrf
                    <input type="hidden" name="send_intent" value="{{ old('send_intent', (string) \Illuminate\Support\Str::uuid()) }}">

                    <div class="pointer-events-none absolute -left-[9999px] h-0 w-0 overflow-hidden opacity-0" aria-hidden="true">
                        <label for="website">Website</label>
                        <input type="text" name="website" id="website" tabindex="-1" autocomplete="off">
                    </div>

                    @if (session('success'))
                        <div
                            data-form-feedback
                            data-flash
                            class="mb-6 rounded-none border border-brand-200 bg-brand-50 px-4 py-3 text-sm font-medium text-brand-800"
                            role="status"
                        >
                            {{ session('success') }}
                        </div>
                    @elseif (session('error'))
                        <div
                            data-form-feedback
                            data-flash
                            class="mb-6 rounded-none border border-red-200 bg-red-50 px-4 py-3 text-sm font-medium text-red-800"
                            role="alert"
                        >
                            {{ session('error') }}
                        </div>
                    @elseif ($errors->any())
                        <div
                            data-form-feedback
                            data-flash
                            class="mb-6 rounded-none border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-800"
                            role="alert"
                        >
                            Confira os campos destacados e tente novamente.
                        </div>
                    @else
                        <div data-form-feedback class="mb-6 hidden rounded-none border px-4 py-3 text-sm" role="status"></div>
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
                                class="mt-1.5 w-full rounded-none border border-brand-950/10 bg-white px-3 py-2.5 text-sm outline-none ring-brand-500 focus:ring-2 @error('name') border-red-400 @enderror"
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
                                class="mt-1.5 w-full rounded-none border border-brand-950/10 bg-white px-3 py-2.5 text-sm outline-none ring-brand-500 focus:ring-2 @error('email') border-red-400 @enderror"
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
                                class="mt-1.5 w-full rounded-none border border-brand-950/10 bg-white px-3 py-2.5 text-sm outline-none ring-brand-500 focus:ring-2 @error('phone') border-red-400 @enderror"
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
                                class="mt-1.5 w-full rounded-none border border-brand-950/10 bg-white px-3 py-2.5 text-sm outline-none ring-brand-500 focus:ring-2 @error('project_type') border-red-400 @enderror"
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
                                class="mt-1.5 w-full rounded-none border border-brand-950/10 bg-white px-3 py-2.5 text-sm outline-none ring-brand-500 focus:ring-2 @error('message') border-red-400 @enderror"
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
                        class="mt-6 inline-flex w-full items-center justify-center rounded-none bg-brand-500 px-5 py-2.5 text-sm font-bold text-white transition hover:bg-brand-600 disabled:cursor-not-allowed disabled:opacity-70 sm:w-auto"
                    >
                        Enviar mensagem
                    </button>
                </form></div></div></section>
</div>
@endsection
