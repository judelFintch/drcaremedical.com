<x-layouts.app :title="__('nav.services')" :description="__('services.hero_description')">
    <section class="bg-brand-950 py-16">
        <div class="mx-auto max-w-4xl px-4 text-center sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-white sm:text-4xl">{{ __('services.hero_title') }}</h1>
            <p class="mx-auto mt-4 max-w-2xl text-base text-brand-100">{{ __('services.hero_description') }}</p>
        </div>
    </section>

    <section class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @foreach (range(1, 9) as $i)
                <x-card>
                    <span class="flex h-9 w-9 items-center justify-center rounded-md bg-brand-100 text-sm font-bold text-brand-700">{{ $i }}</span>
                    <p class="mt-4 text-sm font-semibold text-neutral-900">{{ __("services.service_{$i}_title") }}</p>
                    <p class="mt-1.5 text-sm leading-relaxed text-neutral-600">{{ __("services.service_{$i}_description") }}</p>
                </x-card>
            @endforeach
        </div>
    </section>

    <section class="bg-neutral-50 py-16">
        <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
            <x-section-title :title="__('services.process_title')" align="center" class="mx-auto" />
            <ol class="mt-12 space-y-8 border-l border-brand-200 pl-8">
                @foreach (range(1, 8) as $step)
                    <li class="relative">
                        <span class="absolute -left-[41px] flex h-8 w-8 items-center justify-center rounded-full bg-brand-600 text-xs font-bold text-white">{{ $step }}</span>
                        <p class="text-sm font-semibold text-neutral-900">{{ __("services.process_step_{$step}_title") }}</p>
                        <p class="mt-1 text-sm leading-relaxed text-neutral-600">{{ __("services.process_step_{$step}_description") }}</p>
                    </li>
                @endforeach
            </ol>
        </div>
    </section>

    <section class="bg-brand-950">
        <div class="mx-auto max-w-4xl px-4 py-16 text-center sm:px-6 lg:px-8">
            <h2 class="text-2xl font-bold text-white sm:text-3xl">{{ __('services.cta_title') }}</h2>
            <div class="mt-8">
                <x-button as="a" :href="route('quote.create')" size="lg">{{ __('services.cta_button') }}</x-button>
            </div>
        </div>
    </section>
</x-layouts.app>
