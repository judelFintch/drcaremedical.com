@props(['class' => ''])

<div {{ $attributes->merge(['class' => 'inline-flex items-center gap-1 rounded-full border border-neutral-200 p-0.5 text-sm '.$class]) }}>
    @foreach (['fr' => 'FR', 'en' => 'EN'] as $locale => $label)
        <a
            href="{{ route('locale.switch', $locale) }}"
            class="rounded-full px-2.5 py-1 font-medium transition-colors {{ app()->getLocale() === $locale ? 'bg-brand-600 text-white' : 'text-neutral-600 hover:bg-neutral-100' }}"
            @if (app()->getLocale() === $locale) aria-current="true" @endif
        >
            {{ $label }}
        </a>
    @endforeach
</div>
