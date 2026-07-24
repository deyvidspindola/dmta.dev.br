{{-- Página temporária: escolha do monograma DMTA (item 1) --}}
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Escolha do logo DMTA</title>
    @vite(['resources/css/app.css'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@600;700&display=swap" rel="stylesheet">
</head>
<body class="min-h-screen bg-surface px-4 py-16 font-sans text-ink">
    <div class="mx-auto max-w-3xl">
        <p class="text-sm font-semibold uppercase tracking-wider text-brand-500">Item 1 — Logo</p>
        <h1 class="mt-2 font-display text-3xl font-bold text-brand-950">Escolha o monograma</h1>
        <p class="mt-3 text-muted">
            Três variações. Responda com <strong>A</strong>, <strong>B</strong> ou <strong>C</strong> para eu aplicar no header, rodapé e favicon.
            O wordmark “DMTA” fica igual nas três — o que muda é só o selo.
        </p>

        <div class="mt-12 space-y-10">
            {{-- A: D sólido --}}
            <article class="rounded-2xl bg-white p-8 ring-1 ring-brand-950/10">
                <p class="font-mono text-xs font-bold uppercase tracking-wider text-brand-500">Opção A — D sólido</p>
                <div class="mt-6 flex items-center gap-3">
                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none" aria-hidden="true">
                        <rect width="40" height="40" rx="10" fill="#2B4DFF"/>
                        <path d="M12 10h9.2c5.55 0 9.1 3.2 9.1 9.35S26.75 28.7 21.2 28.7H12V10zm4.7 4.55v9.6h4.35c2.7 0 4.35-1.55 4.35-4.8s-1.65-4.8-4.35-4.8H16.7z" fill="#fff"/>
                    </svg>
                    <span class="font-display text-2xl font-bold tracking-tight text-brand-950">DMTA</span>
                </div>
                <p class="mt-4 text-sm text-muted">Mais limpo e institucional. Bom para header claro.</p>
            </article>

            {{-- B: D contorno --}}
            <article class="rounded-2xl bg-white p-8 ring-1 ring-brand-950/10">
                <p class="font-mono text-xs font-bold uppercase tracking-wider text-brand-500">Opção B — D contorno</p>
                <div class="mt-6 flex items-center gap-3">
                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none" aria-hidden="true">
                        <rect x="1" y="1" width="38" height="38" rx="10" stroke="#2B4DFF" stroke-width="2" fill="#EEF2FF"/>
                        <path d="M12 10h9.2c5.55 0 9.1 3.2 9.1 9.35S26.75 28.7 21.2 28.7H12V10zm4.7 4.55v9.6h4.35c2.7 0 4.35-1.55 4.35-4.8s-1.65-4.8-4.35-4.8H16.7z" fill="#2B4DFF"/>
                    </svg>
                    <span class="font-display text-2xl font-bold tracking-tight text-brand-950">DMTA</span>
                </div>
                <p class="mt-4 text-sm text-muted">Mais leve; selo com fundo brand-50 e D preenchido.</p>
            </article>

            {{-- C: D + tela/código --}}
            <article class="rounded-2xl bg-white p-8 ring-1 ring-brand-950/10">
                <p class="font-mono text-xs font-bold uppercase tracking-wider text-brand-500">Opção C — D + tela</p>
                <div class="mt-6 flex items-center gap-3">
                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none" aria-hidden="true">
                        <rect width="40" height="40" rx="10" fill="#0A165E"/>
                        <rect x="8" y="10" width="24" height="16" rx="2" stroke="#2B4DFF" stroke-width="1.5" fill="none"/>
                        <path d="M14 13h7.2c3.4 0 5.5 1.85 5.5 5.1S24.6 23.2 21.2 23.2H14V13zm3.2 2.9v4.4h3.85c1.7 0 2.7-.9 2.7-2.2s-1-2.2-2.7-2.2H17.2z" fill="#fff"/>
                        <rect x="14" y="29" width="12" height="2" rx="1" fill="#2B4DFF"/>
                    </svg>
                    <span class="font-display text-2xl font-bold tracking-tight text-brand-950">DMTA</span>
                </div>
                <p class="mt-4 text-sm text-muted">Remete a produto digital / tela — mais “tech”.</p>
            </article>
        </div>

        <p class="mt-10 text-sm text-muted">
            Enquanto isso, o header do site já não usa o SVG quebrado que parecia “DLIR” — ficou texto “DMTA” temporário até você escolher.
        </p>
        <a href="/" class="mt-4 inline-block text-sm font-bold text-brand-600 hover:underline">← Voltar ao site</a>
    </div>
</body>
</html>
