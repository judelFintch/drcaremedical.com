@props(['color' => 'gray'])

@php
    $colors = [
        'gray' => 'bg-neutral-100 text-neutral-700',
        'blue' => 'bg-brand-100 text-brand-800',
        'green' => 'bg-accent-100 text-accent-600',
        'amber' => 'bg-amber-100 text-amber-800',
        'red' => 'bg-red-100 text-red-700',
        'violet' => 'bg-violet-100 text-violet-700',
    ];
@endphp

<span {{ $attributes->merge(['class' => 'inline-flex items-center rounded-full px-2.5 py-1 text-xs font-medium '.($colors[$color] ?? $colors['gray'])]) }}>
    {{ $slot }}
</span>
