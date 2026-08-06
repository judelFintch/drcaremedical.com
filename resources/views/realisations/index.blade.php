<x-layouts.app :title="__('realisations.hero_title')" :description="__('realisations.hero_description')">
    <section class="bg-brand-950 py-16">
        <div class="mx-auto max-w-4xl px-4 text-center sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-white sm:text-4xl">{{ __('realisations.hero_title') }}</h1>
            <p class="mx-auto mt-4 max-w-2xl text-base text-brand-100">{{ __('realisations.hero_description') }}</p>
        </div>
    </section>

    <section class="mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8">
        @if ($cities->isNotEmpty())
            <form method="GET" action="{{ route('realisations.index') }}" class="sm:w-64">
                <label for="city" class="block text-sm font-medium text-neutral-800">{{ __('realisations.filter_city') }}</label>
                <select id="city" name="city" onchange="this.form.submit()" class="mt-1.5 block w-full rounded-md border border-neutral-300 bg-white px-3.5 py-2.5 text-sm focus:border-brand-600 focus:outline-none focus:ring-2 focus:ring-brand-100">
                    <option value="">{{ __('realisations.all_cities') }}</option>
                    @foreach ($cities as $city)
                        <option value="{{ $city }}" @selected(request('city') === $city)>{{ $city }}</option>
                    @endforeach
                </select>
            </form>
        @endif

        @if ($realisations->isEmpty())
            <x-empty-state :title="__('realisations.empty_title')" class="mt-10" />
        @else
            <div class="mt-10 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($realisations as $realisation)
                    <a href="{{ route('realisations.show', $realisation) }}" class="group overflow-hidden rounded-lg border border-neutral-200">
                        <div class="aspect-[4/3] bg-neutral-100">
                            @if ($realisation->main_image)
                                <img src="{{ media_url($realisation->main_image) }}" alt="{{ t($realisation, 'title') }}" class="h-full w-full object-cover" loading="lazy">
                            @endif
                        </div>
                        <div class="p-5">
                            @if ($realisation->city)
                                <p class="text-xs font-semibold uppercase tracking-wide text-brand-600">{{ $realisation->city }}</p>
                            @endif
                            <p class="mt-1.5 text-sm font-semibold text-neutral-900 group-hover:text-brand-700">{{ t($realisation, 'title') }}</p>
                            @if ($realisation->summary_fr)
                                <p class="mt-2 text-sm leading-relaxed text-neutral-600">{{ t($realisation, 'summary') }}</p>
                            @endif
                        </div>
                    </a>
                @endforeach
            </div>

            <div class="mt-10">
                {{ $realisations->links() }}
            </div>
        @endif
    </section>
</x-layouts.app>
