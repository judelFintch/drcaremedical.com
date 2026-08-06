@props(['items' => []])

<nav aria-label="Fil d'Ariane" {{ $attributes->merge(['class' => 'text-sm']) }}>
    <ol class="flex flex-wrap items-center gap-1.5 text-neutral-500">
        <li>
            <a href="{{ route('home') }}" class="hover:text-brand-700">{{ __('nav.home') }}</a>
        </li>
        @foreach ($items as $item)
            <li class="flex items-center gap-1.5">
                <span aria-hidden="true">/</span>
                @if (! $loop->last && ($item['url'] ?? null))
                    <a href="{{ $item['url'] }}" class="hover:text-brand-700">{{ $item['label'] }}</a>
                @else
                    <span class="text-neutral-800" aria-current="page">{{ $item['label'] }}</span>
                @endif
            </li>
        @endforeach
    </ol>
</nav>
