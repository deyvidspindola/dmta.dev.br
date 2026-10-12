@props([
    'href',
    'variant' => 'primary',
    'size' => 'md',
])

@php
    $sizes = [
        'sm' => 'px-3 py-2 text-sm',
        'md' => 'px-4 py-2.5 text-sm',
        'lg' => 'px-5 py-3 text-base',
    ];

    $variants = [
        'primary' => 'bg-brand-500 text-white shadow-sm hover:bg-brand-600',
        'secondary' => 'border border-brand-950/10 bg-white text-brand-950 hover:bg-brand-50',
        'ghost' => 'text-brand-700 hover:bg-brand-50',
        'on-dark' => 'bg-white text-brand-950 shadow-sm hover:bg-brand-50',
    ];
@endphp

<a
    href="{{ $href }}"
    {{ $attributes->class([
        'inline-flex items-center justify-center gap-2 rounded-lg font-bold transition',
        $sizes[$size] ?? $sizes['md'],
        $variants[$variant] ?? $variants['primary'],
    ]) }}
>
    {{ $slot }}
</a>
