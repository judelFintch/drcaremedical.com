@props(['type' => 'success'])

@php
    $styles = [
        'success' => 'bg-accent-100 text-accent-600 border-accent-500/20',
        'error' => 'bg-red-50 text-red-700 border-red-500/20',
    ];
@endphp

<div role="status" {{ $attributes->merge(['class' => 'rounded-md border px-4 py-3 text-sm '.($styles[$type] ?? $styles['success'])]) }}>
    {{ $slot }}
</div>
