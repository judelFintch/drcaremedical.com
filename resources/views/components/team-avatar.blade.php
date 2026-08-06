@props([
    'member',
    'size' => 'md',
])

@php
    $sizes = [
        'sm' => 'h-14 w-14 text-sm',
        'md' => 'h-18 w-18 text-base',
        'lg' => 'h-24 w-24 text-xl',
    ];
    $initials = collect(preg_split('/\s+/u', trim($member->name)))
        ->filter()
        ->take(2)
        ->map(fn ($part) => mb_strtoupper(mb_substr($part, 0, 1)))
        ->implode('');
@endphp

<span {{ $attributes->class([
    'relative inline-grid shrink-0 place-items-center overflow-hidden rounded-full bg-brand-100 font-semibold text-brand-800 ring-4 ring-white shadow-soft',
    $sizes[$size] ?? $sizes['md'],
]) }}>
    @if ($member->photo)
        <img src="{{ media_url($member->photo) }}" alt="{{ $member->name }}" loading="lazy" class="h-full w-full object-cover">
    @else
        <span aria-hidden="true">{{ $initials ?: 'DC' }}</span>
        <span class="sr-only">{{ __('home.team_no_photo', ['name' => $member->name]) }}</span>
    @endif
</span>
