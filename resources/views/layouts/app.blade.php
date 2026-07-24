<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'DMTA — Sites, sistemas e soluções digitais')</title>
    <meta name="description" content="@yield('meta_description', 'A DMTA cria sites, sistemas sob medida e soluções digitais que geram resultado. Solicite um orçamento ou fale no WhatsApp.')">

    @if ($gaId = config('services.google_analytics.measurement_id'))
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ $gaId }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', '{{ $gaId }}');
        </script>
    @endif

    <link rel="icon" href="{{ asset('images/brand/favicon.svg') }}" type="image/svg+xml">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Sora:wght@500;600;700;800&display=swap" rel="stylesheet">

    @if (config('services.recaptcha.site_key'))
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    @endif

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen flex flex-col">
    @include('layouts.partials.header')

    <main class="flex-1">
        @yield('content')
    </main>

    @include('layouts.partials.footer')
    @include('layouts.partials.whatsapp-float')
</body>
</html>
