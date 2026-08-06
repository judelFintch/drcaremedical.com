@props(['title', 'description' => null])

<div {{ $attributes->merge(['class' => 'rounded-lg border border-dashed border-neutral-300 bg-neutral-50 px-6 py-12 text-center']) }}>
    @isset($icon)
        <div class="mx-auto mb-4 flex h-12 w-12 items-center justify-center rounded-full bg-brand-100 text-brand-600">
            {{ $icon }}
        </div>
    @endisset
    <p class="text-base font-semibold text-neutral-800">{{ $title }}</p>
    @if ($description)
        <p class="mt-1 text-sm text-neutral-500">{{ $description }}</p>
    @endif
    @isset($action)
        <div class="mt-4">{{ $action }}</div>
    @endisset
</div>
