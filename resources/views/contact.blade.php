@extends('layouts.app')

@section('title', 'Contato — DMTA')
@section('meta_description', 'Solicite um orçamento ou fale no WhatsApp com a DMTA. Sites, sistemas e soluções digitais sob medida.')

@section('content')
    <section class="relative isolate overflow-hidden">
        <img
            src="{{ asset('images/marketing/hero-workspace.jpg') }}"
            alt=""
            class="absolute inset-0 h-full w-full object-cover"
        >
        <div class="absolute inset-0 bg-brand-950/86" aria-hidden="true"></div>
        <div class="relative mx-auto max-w-6xl px-4 py-20 sm:px-6 lg:px-8">
            <p class="font-display text-sm font-bold uppercase tracking-[0.24em] text-brand-300">Contato</p>
            <h1 class="mt-4 max-w-3xl text-4xl font-extrabold text-white sm:text-5xl text-balance">
                Vamos tirar seu projeto do papel.
            </h1>
            <p class="mt-5 max-w-2xl text-lg text-white/75">
                Preencha o formulário ou chame no WhatsApp. Respondemos com o próximo passo — objetivo e sem enrolação.
            </p>
        </div>
    </section>

    <section class="bg-white py-16">
        <div class="mx-auto grid max-w-6xl gap-12 px-4 sm:px-6 lg:grid-cols-12 lg:px-8">
            <div class="lg:col-span-5">
                <h2 class="text-xl font-bold">Canais diretos</h2>
                <ul class="mt-6 space-y-5 text-sm">
                    <li>
                        <p class="font-semibold text-brand-950">WhatsApp</p>
                        <x-whatsapp-button class="mt-2" message="Olá! Vim pela página de contato da DMTA." />
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
                    <li>
                        <p class="font-semibold text-brand-950">Região</p>
                        <p class="mt-1 text-muted">Paulínia e Interior de SP — atendimento remoto também.</p>
                    </li>
                </ul>
            </div>

            <div class="lg:col-span-7">
                <form
                    action="{{ route('contact.store') }}"
                    method="POST"
                    class="relative rounded-2xl bg-surface p-6 ring-1 ring-brand-950/10 sm:p-8"
                    novalidate
                >
                    @csrf

                    {{-- Honeypot --}}
                    <div class="pointer-events-none absolute -left-[9999px] h-0 w-0 overflow-hidden opacity-0" aria-hidden="true">
                        <label for="website">Website</label>
                        <input type="text" name="website" id="website" tabindex="-1" autocomplete="off">
                    </div>

                    @if ($errors->any())
                        <div class="mb-6 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-800" role="alert">
                            Confira os campos destacados e tente novamente.
                        </div>
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
                                class="mt-1.5 w-full rounded-lg border border-brand-950/10 bg-white px-3 py-2.5 text-sm outline-none ring-brand-500 focus:ring-2 @error('name') border-red-400 @enderror"
                            >
                            @error('name') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-semibold text-brand-950">E-mail</label>
                            <input
                                type="email"
                                name="email"
                                id="email"
                                value="{{ old('email') }}"
                                required
                                class="mt-1.5 w-full rounded-lg border border-brand-950/10 bg-white px-3 py-2.5 text-sm outline-none ring-brand-500 focus:ring-2 @error('email') border-red-400 @enderror"
                            >
                            @error('email') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="phone" class="block text-sm font-semibold text-brand-950">Telefone / WhatsApp</label>
                            <input
                                type="tel"
                                name="phone"
                                id="phone"
                                value="{{ old('phone') }}"
                                class="mt-1.5 w-full rounded-lg border border-brand-950/10 bg-white px-3 py-2.5 text-sm outline-none ring-brand-500 focus:ring-2 @error('phone') border-red-400 @enderror"
                            >
                            @error('phone') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div class="sm:col-span-2">
                            <label for="project_type" class="block text-sm font-semibold text-brand-950">Tipo de projeto</label>
                            <select
                                name="project_type"
                                id="project_type"
                                required
                                class="mt-1.5 w-full rounded-lg border border-brand-950/10 bg-white px-3 py-2.5 text-sm outline-none ring-brand-500 focus:ring-2 @error('project_type') border-red-400 @enderror"
                            >
                                <option value="" disabled @selected(old('project_type') === null)>Selecione</option>
                                @foreach (['Site institucional', 'Landing page', 'Sistema personalizado', 'E-commerce', 'Manutenção / suporte', 'Outro'] as $type)
                                    <option value="{{ $type }}" @selected(old('project_type') === $type)>{{ $type }}</option>
                                @endforeach
                            </select>
                            @error('project_type') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div class="sm:col-span-2">
                            <label for="message" class="block text-sm font-semibold text-brand-950">Mensagem</label>
                            <textarea
                                name="message"
                                id="message"
                                rows="5"
                                required
                                class="mt-1.5 w-full rounded-lg border border-brand-950/10 bg-white px-3 py-2.5 text-sm outline-none ring-brand-500 focus:ring-2 @error('message') border-red-400 @enderror"
                            >{{ old('message') }}</textarea>
                            @error('message') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div class="mt-6 flex flex-col gap-3 sm:flex-row sm:items-center">
                        <button
                            type="submit"
                            class="inline-flex items-center justify-center rounded-lg bg-brand-500 px-5 py-2.5 text-sm font-bold text-white transition hover:bg-brand-600"
                        >
                            Enviar mensagem
                        </button>
                        <p class="text-xs text-muted">Ou, se preferir,</p>
                        <x-whatsapp-button size="sm" message="Olá! Prefiro conversar pelo WhatsApp sobre um orçamento." />
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
