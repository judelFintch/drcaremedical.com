@props([
    'eyebrow' => null,
    'title',
    'description' => null,
    'align' => 'left',
])

<div {{ $attributes->merge(['class' => 'max-w-2xl '.($align === 'center' ? 'mx-auto text-center' : '')]) }}>
    @if ($eyebrow)
        <p class="text-sm font-semibold uppercase tracking-wide text-brand-600">{{ $eyebrow }}</p>
    @endif
    <h2 class="mt-2 text-2xl font-bold tracking-tight text-brand-950 sm:text-3xl">{{ $title }}</h2>
    @if ($description)
        <p class="mt-3 text-base leading-relaxed text-neutral-700">{{ $description }}</p>
    @endif
</div>
