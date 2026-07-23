<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'DMTA — Sites, sistemas e soluções digitais')</title>
    <meta name="description" content="@yield('meta_description', 'A DMTA cria sites, sistemas sob medida e soluções digitais que geram resultado. Solicite um orçamento ou fale no WhatsApp.')">

    <link rel="icon" href="{{ asset('images/brand/favicon.svg') }}" type="image/svg+xml">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Sora:wght@500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen flex flex-col">
    @include('layouts.partials.header')

    <main class="flex-1">
        @if (session('success'))
            <div class="border-b border-brand-200 bg-brand-50 px-4 py-3 text-center text-sm font-medium text-brand-800" role="status">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>

    @include('layouts.partials.footer')
    @include('layouts.partials.whatsapp-float')
</body>
</html>
