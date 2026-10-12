@extends('layouts.app')
@section('title', 'Identidade visual — DMTA')
@section('content')
<section class="mx-auto max-w-6xl px-6 py-20"><p class="text-sm text-muted">Identidade visual</p><h1 class="mt-3 text-4xl font-semibold">DMTA · Desenvolvimento web</h1><p class="mt-5 max-w-xl text-muted">Assinatura com letras desenhadas em vetor. Estrutura simples, legibilidade e aplicações em uma única cor.</p><div class="mt-12 grid gap-6 sm:grid-cols-2"><div class="border border-brand-950/10 bg-white p-10"><img src="{{ asset('images/brand/dmta-wordmark.svg') }}" width="246" height="60" alt="DMTA em grafite"></div><div class="bg-brand-950 p-10"><img src="{{ asset('images/brand/dmta-wordmark-white.svg') }}" width="246" height="60" alt="DMTA em branco"></div></div><a href="/" class="mt-10 inline-block underline underline-offset-4">Voltar ao site</a></section>
@endsection
