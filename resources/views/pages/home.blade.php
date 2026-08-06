<x-layouts.app :title="__('nav.home')">

    {{-- 1. Hero --}}
    <section class="relative overflow-hidden bg-brand-950">
        <div class="mx-auto grid max-w-7xl grid-cols-1 items-center gap-12 px-4 py-20 sm:px-6 lg:grid-cols-2 lg:px-8 lg:py-28">
            <div>
                <p class="text-sm font-semibold uppercase tracking-wide text-brand-300">{{ __('home.hero_eyebrow') }}</p>
                <h1 class="mt-3 text-3xl font-bold leading-tight tracking-tight text-white sm:text-4xl lg:text-5xl">
                    {{ __('home.hero_title') }}
                </h1>
                <p class="mt-5 max-w-xl text-base leading-relaxed text-brand-100">{{ __('home.hero_description') }}</p>
                <div class="mt-8 flex flex-wrap gap-4">
                    <x-button as="a" :href="route('quote.create')" size="lg">{{ __('home.hero_cta_primary') }}</x-button>
                    <x-button as="a" :href="route('services')" variant="secondary" size="lg" class="!border-white/20 !bg-white/5 !text-white hover:!bg-white/10">
                        {{ __('home.hero_cta_secondary') }}
                    </x-button>
                </div>
                <p class="mt-8 flex items-center gap-2 text-sm text-brand-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    {{ __('home.hero_trust') }}
                </p>
            </div>
            <div class="relative hidden lg:block" aria-hidden="true">
                <div class="grid grid-cols-2 gap-4">
                    <div class="aspect-[3/4] rounded-lg bg-brand-800/60"></div>
                    <div class="mt-8 aspect-[3/4] rounded-lg bg-brand-700/60"></div>
                </div>
            </div>
        </div>
    </section>

    {{-- 2. Présentation rapide --}}
    <section class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 gap-10 lg:grid-cols-3">
            <x-section-title :eyebrow="__('home.intro_eyebrow')" :title="__('home.intro_title')" class="lg:col-span-1" />
            <p class="text-base leading-relaxed text-neutral-700 lg:col-span-2">{{ __('home.intro_description') }}</p>
        </div>
    </section>

    {{-- 3. Branche de China Medical Care --}}
    <section class="bg-brand-50 py-16">
        <div class="mx-auto max-w-4xl px-4 text-center sm:px-6 lg:px-8">
            <h2 class="text-2xl font-bold tracking-tight text-brand-950 sm:text-3xl">{{ __('home.china_title') }}</h2>
            <p class="mt-4 text-base leading-relaxed text-neutral-700">{{ __('home.china_description') }}</p>
        </div>
    </section>

    {{-- 4. Familles de matériel --}}
    @php $categories = \App\Models\Category::query()->active()->ordered()->get(); @endphp
    @if ($categories->isNotEmpty())
        <section class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
            <div class="flex flex-wrap items-end justify-between gap-4">
                <x-section-title :eyebrow="__('home.equipment_eyebrow')" :title="__('home.equipment_title')" :description="__('home.equipment_description')" />
                <x-button as="a" :href="route('catalog.index')" variant="secondary">{{ __('home.equipment_cta') }}</x-button>
            </div>
            <div class="mt-10 grid grid-cols-2 gap-4 sm:grid-cols-3 lg:grid-cols-6">
                @foreach ($categories as $category)
                    <a href="{{ route('catalog.index', ['category' => $category->slug]) }}" class="group rounded-lg border border-neutral-200 p-4 text-center transition-colors hover:border-brand-300 hover:bg-brand-50">
                        <span class="block text-sm font-medium text-neutral-800 group-hover:text-brand-800">{{ t($category, 'name') }}</span>
                    </a>
                @endforeach
            </div>
        </section>
    @endif

    {{-- 5. Services --}}
    <section class="bg-neutral-50 py-16">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex flex-wrap items-end justify-between gap-4">
                <x-section-title :eyebrow="__('home.services_eyebrow')" :title="__('home.services_title')" :description="__('home.services_description')" />
                <x-button as="a" :href="route('services')" variant="secondary">{{ __('home.services_cta') }}</x-button>
            </div>
            <div class="mt-10 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
                @foreach ([
                    ['title' => __('footer.service_supply'), 'icon' => 'M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v.894m7.5 0a48.667 48.667 0 00-7.5 0'],
                    ['title' => __('footer.service_logistics'), 'icon' => 'M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.677m0 0h-12'],
                    ['title' => __('footer.service_installation'), 'icon' => 'M11.42 15.17L17.25 21A2.652 2.652 0 0021 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 11-3.586-3.586l6.837-5.63m5.108-.233c.55-.164 1.163-.188 1.743-.14a4.5 4.5 0 004.486-6.336l-3.276 3.277a3.004 3.004 0 01-2.25-2.25l3.276-3.276a4.5 4.5 0 00-6.336 4.486c.091 1.076-.071 2.264-.904 2.95l-.102.085m-1.745 1.437L5.909 7.5H4.5L2.25 3.75l1.5-1.5L7.5 4.5v1.409l4.26 4.26m-1.745 1.437l1.745-1.437m6.615 8.206L15.75 15.75M4.867 19.125h.008v.008h-.008v-.008z'],
                    ['title' => __('footer.service_maintenance'), 'icon' => 'M11.42 15.17L17.25 21A2.652 2.652 0 0021 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 11-3.586-3.586l6.837-5.63m5.108-.233c.55-.164 1.163-.188 1.743-.14a4.5 4.5 0 004.486-6.336l-3.276 3.277a3.004 3.004 0 01-2.25-2.25l3.276-3.276a4.5 4.5 0 00-6.336 4.486c.091 1.076-.071 2.264-.904 2.95l-.102.085z'],
                ] as $service)
                    <x-card>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-brand-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="{{ $service['icon'] }}" />
                        </svg>
                        <p class="mt-4 text-sm font-semibold text-neutral-900">{{ $service['title'] }}</p>
                    </x-card>
                @endforeach
            </div>
        </div>
    </section>

    {{-- 6. Processus --}}
    <section class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
        <x-section-title :eyebrow="__('home.process_eyebrow')" :title="__('home.process_title')" align="center" class="mx-auto" />
        <div class="mt-12 grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-4">
            @foreach (range(1, 4) as $step)
                <div class="relative pl-12">
                    <span class="absolute left-0 top-0 flex h-9 w-9 items-center justify-center rounded-full bg-brand-600 text-sm font-bold text-white">{{ $step }}</span>
                    <p class="text-sm font-semibold text-neutral-900">{{ __("home.process_step_{$step}_title") }}</p>
                    <p class="mt-1.5 text-sm leading-relaxed text-neutral-600">{{ __("home.process_step_{$step}_description") }}</p>
                </div>
            @endforeach
        </div>
    </section>

    {{-- 7. Villes de présence --}}
    <section class="bg-brand-900 py-16">
        <div class="mx-auto max-w-7xl px-4 text-center sm:px-6 lg:px-8">
            <p class="text-sm font-semibold uppercase tracking-wide text-brand-300">{{ __('home.cities_eyebrow') }}</p>
            <h2 class="mt-2 text-2xl font-bold text-white sm:text-3xl">{{ __('home.cities_title') }}</h2>
            <p class="mx-auto mt-3 max-w-2xl text-sm text-brand-100">{{ __('home.cities_description') }}</p>
            <div class="mt-10 grid grid-cols-2 gap-4 sm:grid-cols-4">
                @foreach (config('drc.company.cities') as $city)
                    <div class="rounded-lg border border-white/10 bg-white/5 py-6 text-base font-semibold text-white">{{ $city }}</div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- 8. Réalisations récentes --}}
    <section class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
        <div class="flex flex-wrap items-end justify-between gap-4">
            <x-section-title :eyebrow="__('home.realisations_eyebrow')" :title="__('home.realisations_title')" />
            <x-button as="a" :href="route('realisations.index')" variant="secondary">{{ __('home.realisations_cta') }}</x-button>
        </div>
        @if ($featuredRealisations->isNotEmpty())
            <div class="mt-10 grid grid-cols-1 gap-6 sm:grid-cols-3">
                @foreach ($featuredRealisations as $realisation)
                    <a href="{{ route('realisations.show', $realisation) }}" class="group block overflow-hidden rounded-lg border border-neutral-200">
                        <div class="aspect-[4/3] bg-neutral-100">
                            @if ($realisation->main_image)
                                <img src="{{ media_url($realisation->main_image) }}" alt="{{ t($realisation, 'title') }}" class="h-full w-full object-cover">
                            @endif
                        </div>
                        <div class="p-4">
                            @if ($realisation->city)
                                <p class="text-xs font-semibold uppercase tracking-wide text-brand-600">{{ $realisation->city }}</p>
                            @endif
                            <p class="mt-1 text-sm font-semibold text-neutral-900 group-hover:text-brand-700">{{ t($realisation, 'title') }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        @else
            <x-empty-state :title="__('home.empty_realisations')" class="mt-10" />
        @endif
    </section>

    {{-- 9. Partenaires --}}
    @if ($partners->isNotEmpty())
        <section class="bg-neutral-50 py-16">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <x-section-title :eyebrow="__('home.partners_eyebrow')" :title="__('home.partners_title')" align="center" class="mx-auto" />
                <div class="mt-10 grid grid-cols-2 items-center gap-8 sm:grid-cols-4">
                    @foreach ($partners as $partner)
                        <div class="flex h-16 items-center justify-center rounded-md bg-white px-4">
                            @if ($partner->logo)
                                <img src="{{ media_url($partner->logo) }}" alt="{{ $partner->name }}" class="max-h-12 max-w-full object-contain">
                            @else
                                <span class="text-sm font-medium text-neutral-500">{{ $partner->name }}</span>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- 10. Témoignages --}}
    @if ($testimonials->isNotEmpty())
        <section class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8" x-data="{ active: 0, count: {{ $testimonials->count() }} }">
            <x-section-title :eyebrow="__('home.testimonials_eyebrow')" :title="__('home.testimonials_title')" align="center" class="mx-auto" />
            <div class="relative mx-auto mt-10 max-w-2xl">
                @foreach ($testimonials as $testimonial)
                    <div x-show="active === {{ $loop->index }}" x-cloak>
                        <x-card class="text-center">
                            <p class="text-base italic leading-relaxed text-neutral-700">« {{ t($testimonial, 'content') }} »</p>
                            <p class="mt-4 text-sm font-semibold text-neutral-900">{{ $testimonial->name }}</p>
                            <p class="text-xs text-neutral-500">{{ collect([$testimonial->role, $testimonial->institution])->filter()->implode(' · ') }}</p>
                        </x-card>
                    </div>
                @endforeach
                @if ($testimonials->count() > 1)
                    <div class="mt-6 flex justify-center gap-2">
                        @foreach ($testimonials as $testimonial)
                            <button
                                type="button"
                                @click="active = {{ $loop->index }}"
                                :class="active === {{ $loop->index }} ? 'bg-brand-600' : 'bg-neutral-300'"
                                class="h-2 w-2 rounded-full transition-colors"
                                aria-label="Témoignage {{ $loop->iteration }}"
                            ></button>
                        @endforeach
                    </div>
                @endif
            </div>
        </section>
    @endif

    {{-- 11. Chiffres clés --}}
    @if ($stats->isNotEmpty())
        <section class="bg-brand-50 py-16">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <h2 class="text-center text-2xl font-bold tracking-tight text-brand-950 sm:text-3xl">{{ __('home.stats_title') }}</h2>
                <div class="mt-10 grid grid-cols-2 gap-6 sm:grid-cols-{{ min($stats->count(), 4) }}">
                    @foreach ($stats as $stat)
                        <div class="text-center">
                            <p class="text-3xl font-bold text-brand-700">{{ $stat->value }}</p>
                            <p class="mt-1 text-sm text-neutral-600">{{ t($stat, 'label') }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- 12. FAQ --}}
    @if ($faqs->isNotEmpty())
        <section class="mx-auto max-w-4xl px-4 py-16 sm:px-6 lg:px-8">
            <x-section-title :eyebrow="__('home.faq_eyebrow')" :title="__('home.faq_title')" align="center" class="mx-auto" />
            <div class="mt-10 divide-y divide-neutral-200 rounded-lg border border-neutral-200">
                @foreach ($faqs as $faq)
                    <div x-data="{ open: false }">
                        <button type="button" @click="open = !open" class="flex w-full items-center justify-between gap-4 px-5 py-4 text-left" :aria-expanded="open">
                            <span class="text-sm font-medium text-neutral-900">{{ t($faq, 'question') }}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0 text-neutral-500 transition-transform" :class="open ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                        </button>
                        <div x-cloak x-show="open" x-collapse class="px-5 pb-4 text-sm leading-relaxed text-neutral-600">
                            {{ t($faq, 'answer') }}
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    @endif

    {{-- 13. Appel final --}}
    <section class="bg-brand-950">
        <div class="mx-auto max-w-4xl px-4 py-16 text-center sm:px-6 lg:px-8">
            <h2 class="text-2xl font-bold text-white sm:text-3xl">{{ __('home.cta_title') }}</h2>
            <p class="mx-auto mt-3 max-w-xl text-sm text-brand-100">{{ __('home.cta_description') }}</p>
            <div class="mt-8">
                <x-button as="a" :href="route('quote.create')" size="lg">{{ __('home.cta_button') }}</x-button>
            </div>
        </div>
    </section>
</x-layouts.app>
