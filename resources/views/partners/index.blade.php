<x-layouts.app :title="__('partners.hero_title')" :description="__('partners.hero_description')">
    <section class="bg-brand-950 py-16">
        <div class="mx-auto max-w-4xl px-4 text-center sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-white sm:text-4xl">{{ __('partners.hero_title') }}</h1>
            <p class="mx-auto mt-4 max-w-2xl text-base text-brand-100">{{ __('partners.hero_description') }}</p>
        </div>
    </section>

    <section class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
        @if ($partners->isEmpty())
            <x-empty-state :title="__('partners.empty_title')" />
        @else
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($partners as $partner)
                    <x-card class="flex flex-col items-center text-center">
                        <div class="flex h-20 w-full items-center justify-center">
                            @if ($partner->logo)
                                <img src="{{ media_url($partner->logo) }}" alt="{{ $partner->name }}" class="max-h-16 max-w-full object-contain">
                            @else
                                <span class="text-base font-semibold text-neutral-700">{{ $partner->name }}</span>
                            @endif
                        </div>
                        @if ($partner->type)
                            <p class="mt-3 text-xs font-semibold uppercase tracking-wide text-brand-600">{{ $partner->type }}</p>
                        @endif
                        @if ($partner->description_fr)
                            <p class="mt-2 text-sm leading-relaxed text-neutral-600">{{ t($partner, 'description') }}</p>
                        @endif
                        @if ($partner->website)
                            <a href="{{ $partner->website }}" target="_blank" rel="noopener noreferrer" class="mt-3 text-sm font-medium text-brand-700 hover:underline">
                                {{ __('partners.visit_website') }}
                            </a>
                        @endif
                    </x-card>
                @endforeach
            </div>
        @endif
    </section>
</x-layouts.app>
