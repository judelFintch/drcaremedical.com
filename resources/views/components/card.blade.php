@props(['padded' => true])

<div {{ $attributes->merge(['class' => 'rounded-lg border border-neutral-200 bg-white shadow-soft '.($padded ? 'p-6' : '')]) }}>
    {{ $slot }}
</div>
