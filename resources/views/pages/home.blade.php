<x-layouts.app :title="__('nav.home')">
    {{-- Hero avec slider d'équipements médicaux --}}
    @php
        $heroSlides = [
            ['image' => 'images/site/hero-laboratory.webp', 'title' => __('home.hero_slide_1_title'), 'description' => __('home.hero_slide_1_description'), 'alt' => __('home.hero_slide_1_alt')],
            ['image' => 'images/site/hero-operating-room.webp', 'title' => __('home.hero_slide_2_title'), 'description' => __('home.hero_slide_2_description'), 'alt' => __('home.hero_slide_2_alt')],
            ['image' => 'images/site/hero-imaging.webp', 'title' => __('home.hero_slide_3_title'), 'description' => __('home.hero_slide_3_description'), 'alt' => __('home.hero_slide_3_alt')],
            ['image' => 'images/site/hero-patient-care.webp', 'title' => __('home.hero_slide_4_title'), 'description' => __('home.hero_slide_4_description'), 'alt' => __('home.hero_slide_4_alt')],
        ];
    @endphp
    <section
        id="accueil"
        x-data="{ active: 0, timer: null, start() { if (!this.timer && !window.matchMedia('(prefers-reduced-motion: reduce)').matches) this.timer = setInterval(() => this.next(), 6500) }, stop() { clearInterval(this.timer); this.timer = null }, next() { this.active = (this.active + 1) % {{ count($heroSlides) }} }, previous() { this.active = (this.active - 1 + {{ count($heroSlides) }}) % {{ count($heroSlides) }} } }"
        x-init="start()"
        @mouseenter="stop()"
        @mouseleave="start()"
        @focusin="stop()"
        @focusout="start()"
        @keydown.left.prevent="previous()"
        @keydown.right.prevent="next()"
        class="hero-art relative isolate scroll-mt-24 overflow-hidden bg-brand-950 text-white"
        aria-roledescription="carousel"
        aria-label="{{ __('home.hero_slider_label') }}"
    >
        <div class="absolute inset-0">
            @foreach ($heroSlides as $slide)
                <div x-cloak x-show="active === {{ $loop->index }}" x-transition:enter="transition duration-700 ease-out" x-transition:enter-start="opacity-0 scale-[1.02]" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition duration-500 ease-in" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="absolute inset-0">
                    <img src="{{ asset($slide['image']) }}" alt="{{ $slide['alt'] }}" width="1672" height="941" @if ($loop->first) fetchpriority="high" @else loading="lazy" @endif class="h-full w-full object-cover object-center">
                </div>
            @endforeach
            <div class="absolute inset-0 bg-gradient-to-r from-brand-950 via-brand-950/85 to-brand-950/5"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-brand-950/75 via-transparent to-brand-950/20"></div>
        </div>

        <div class="relative mx-auto flex min-h-[680px] max-w-7xl items-center px-5 py-20 sm:min-h-[720px] sm:px-8 lg:min-h-[760px]">
            <div class="w-full max-w-3xl" aria-live="polite">
                <div class="inline-flex items-center gap-3 rounded-full border border-white/15 bg-brand-950/35 px-4 py-2 text-[11px] font-semibold uppercase tracking-[.2em] text-brand-100 backdrop-blur-md">
                    <span class="relative flex h-2 w-2"><span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-accent-500 opacity-60"></span><span class="relative h-2 w-2 rounded-full bg-accent-500"></span></span>
                    {{ __('home.hero_eyebrow') }}
                </div>
                @foreach ($heroSlides as $slide)
                    <div x-cloak x-show="active === {{ $loop->index }}" x-transition.opacity.duration.500ms>
                        <h1 class="mt-7 max-w-3xl text-[clamp(2.7rem,6vw,5.7rem)] font-semibold leading-[.96] tracking-[-.055em] text-white">{{ $slide['title'] }}</h1>
                        <p class="mt-7 max-w-2xl text-base leading-8 text-white/75 sm:text-lg">{{ $slide['description'] }}</p>
                    </div>
                @endforeach
                <div class="mt-9 flex flex-col gap-3 sm:flex-row">
                    <a href="{{ route('quote.create') }}" class="group inline-flex min-h-13 items-center justify-center gap-3 rounded-md bg-white px-6 py-3.5 text-sm font-semibold text-brand-950 transition hover:bg-brand-50">
                        {{ __('home.hero_cta_primary') }}
                        <svg class="h-4 w-4 transition-transform group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M5 12h14m-6-6 6 6-6 6"/></svg>
                    </a>
                    <a href="{{ route('catalog.index') }}" class="inline-flex min-h-13 items-center justify-center rounded-md border border-white/25 bg-brand-950/20 px-6 py-3.5 text-sm font-semibold text-white backdrop-blur-sm transition hover:border-white/50 hover:bg-white/10">{{ __('home.equipment_cta') }}</a>
                </div>
            </div>

            <div class="absolute inset-x-5 bottom-7 flex items-center justify-between sm:inset-x-8 sm:bottom-9">
                <div class="flex gap-2" role="tablist" aria-label="{{ __('home.hero_slider_navigation') }}">
                    @foreach ($heroSlides as $slide)
                        <button type="button" @click="active = {{ $loop->index }}" :aria-selected="active === {{ $loop->index }}" class="h-1.5 rounded-full transition-all duration-300" :class="active === {{ $loop->index }} ? 'w-12 bg-accent-500' : 'w-7 bg-white/35 hover:bg-white/65'" aria-label="{{ __('home.hero_go_to_slide', ['number' => $loop->iteration]) }}"></button>
                    @endforeach
                </div>
                <div class="flex gap-2">
                    <button type="button" @click="previous()" class="grid h-11 w-11 place-items-center rounded-full border border-white/20 bg-brand-950/30 text-white backdrop-blur transition hover:border-white/50 hover:bg-white/10" aria-label="{{ __('home.hero_previous') }}">←</button>
                    <button type="button" @click="next()" class="grid h-11 w-11 place-items-center rounded-full border border-white/20 bg-brand-950/30 text-white backdrop-blur transition hover:border-white/50 hover:bg-white/10" aria-label="{{ __('home.hero_next') }}">→</button>
                </div>
            </div>
        </div>
        <div class="relative border-t border-white/10">
            <div class="mx-auto grid max-w-7xl grid-cols-2 divide-x divide-white/10 px-5 sm:grid-cols-4 sm:px-8">
                @foreach (config('drc.company.cities') as $city)
                    <div class="flex items-center gap-3 px-3 py-5 text-xs font-semibold uppercase tracking-[.12em] text-white/65 first:pl-0 sm:px-6"><span class="h-1.5 w-1.5 rounded-full bg-accent-500"></span>{{ $city }}</div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Manifeste --}}
    <section id="a-propos" class="surface-cloud section-wave-top relative scroll-mt-24 overflow-hidden py-24 sm:py-32">
        <div class="mx-auto grid max-w-7xl gap-12 px-5 sm:px-8 lg:grid-cols-[.62fr_1.38fr] lg:gap-20">
            <div>
                <span class="section-index">01 / DRC CARE</span>
                <p class="mt-7 max-w-xs text-xs font-semibold uppercase leading-6 tracking-[.2em] text-brand-700">{{ __('home.intro_eyebrow') }}</p>
                <div class="mt-8 hidden h-28 w-28 place-items-center rounded-full border border-brand-900/10 bg-white/70 shadow-card lg:grid" aria-hidden="true">
                    <svg class="h-12 w-12 text-brand-600" viewBox="0 0 100 100" fill="currentColor"><path d="M42 16h16v26h26v16H58v26H42V58H16V42h26V16Z"/></svg>
                </div>
            </div>
            <div>
                <h2 class="max-w-4xl text-3xl font-semibold leading-tight tracking-[-.035em] text-brand-950 sm:text-5xl">{{ __('home.intro_title') }}</h2>
                <p class="mt-8 max-w-3xl text-lg leading-8 text-neutral-700">{{ __('home.intro_description') }}</p>
                <div class="mt-12 grid gap-8 rounded-2xl border border-brand-900/10 bg-white/80 p-6 shadow-card backdrop-blur sm:grid-cols-2 sm:p-8">
                    <div><span class="inline-flex rounded-full bg-accent-100 px-3 py-1 text-xs font-bold text-accent-600">China Medical Care</span><h3 class="mt-4 text-xl font-semibold text-brand-950">{{ __('home.china_title') }}</h3></div>
                    <p class="text-sm leading-7 text-neutral-600">{{ __('home.china_description') }}</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Mise en avant institutionnelle de la maison mère --}}
    <aside class="surface-parent parent-company-spotlight relative overflow-hidden" aria-labelledby="parent-company-title">
        <div class="absolute inset-y-0 right-0 hidden w-[42%] lg:block" aria-hidden="true">
            <div class="hero-grid absolute inset-0 bg-brand-950 opacity-100"></div>
            <div class="absolute -right-20 top-1/2 h-80 w-80 -translate-y-1/2 rounded-full border border-white/15"></div>
            <div class="absolute right-16 top-1/2 grid h-40 w-40 -translate-y-1/2 place-items-center rounded-full border border-white/20 bg-brand-950/70 text-center backdrop-blur">
                <span class="text-4xl font-semibold tracking-[-.06em] text-white">CMC</span>
            </div>
        </div>
        <div class="relative mx-auto grid max-w-7xl lg:grid-cols-[1.45fr_1fr]">
            <div class="px-5 py-16 sm:px-8 sm:py-20 lg:pr-20">
                <div class="flex items-center gap-3">
                    <span class="h-px w-10 bg-accent-600"></span>
                    <span class="text-[10px] font-bold uppercase tracking-[.22em] text-accent-600">{{ __('home.parent_eyebrow') }}</span>
                </div>
                <h2 id="parent-company-title" class="mt-5 max-w-2xl text-3xl font-semibold tracking-[-.035em] text-brand-950 sm:text-4xl">{{ __('home.parent_title') }}</h2>
                <p class="mt-5 max-w-2xl text-base leading-7 text-neutral-600">{{ __('home.parent_description') }}</p>
                <div class="mt-8 flex flex-col gap-4 sm:flex-row sm:items-center">
                    <a href="{{ config('drc.company.parent_company_url') }}" target="_blank" rel="noopener noreferrer" class="group inline-flex min-h-12 w-fit items-center gap-4 rounded-md bg-brand-950 px-5 text-sm font-semibold text-white transition hover:bg-brand-800">
                        {{ __('home.parent_cta') }}
                        <svg class="h-4 w-4 transition-transform group-hover:translate-x-0.5 group-hover:-translate-y-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M13.5 6H18m0 0v4.5M18 6l-7.5 7.5M6 8.25v9.75h9.75"/></svg>
                    </a>
                    <span class="font-mono text-xs text-neutral-500">chinacaremedical.com</span>
                </div>
            </div>
            <div class="relative min-h-56 overflow-hidden bg-brand-950 lg:min-h-0 lg:bg-transparent">
                <div class="hero-grid absolute inset-0 opacity-40 lg:hidden" aria-hidden="true"></div>
                <div class="absolute inset-0 flex items-center justify-center lg:hidden" aria-hidden="true"><span class="grid h-32 w-32 place-items-center rounded-full border border-white/20 bg-white/5 text-3xl font-semibold text-white shadow-2xl backdrop-blur">CMC</span></div>
            </div>
        </div>
    </aside>

    {{-- Solution logicielle clinique --}}
    <section class="relative overflow-hidden bg-brand-950 py-20 text-white sm:py-24" aria-labelledby="clinicsoft-title">
        <div class="hero-grid absolute inset-0 opacity-20" aria-hidden="true"></div>
        <div class="absolute -right-32 -top-52 h-96 w-96 rounded-full border border-white/10" aria-hidden="true"></div>
        <div class="relative mx-auto grid max-w-7xl items-center gap-12 px-5 sm:px-8 lg:grid-cols-[1fr_.72fr] lg:gap-16">
            <div class="max-w-3xl">
                <div class="flex items-center gap-3">
                    <span class="h-px w-10 bg-accent-500"></span>
                    <span class="text-[10px] font-bold uppercase tracking-[.22em] text-accent-500">{{ __('home.software_eyebrow') }}</span>
                </div>
                <h2 id="clinicsoft-title" class="mt-5 text-3xl font-semibold leading-tight tracking-[-.035em] text-white sm:text-5xl">{{ __('home.software_title') }}</h2>
                <p class="mt-5 max-w-2xl text-base leading-7 text-white/65">{{ __('home.software_description') }}</p>
                <div class="mt-7 flex flex-wrap gap-2">
                    @foreach ([__('home.software_feature_1'), __('home.software_feature_2'), __('home.software_feature_3')] as $feature)
                        <span class="inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/[.06] px-3 py-2 text-xs font-medium text-brand-100"><span class="text-accent-500">✓</span>{{ $feature }}</span>
                    @endforeach
                </div>
            </div>
            <div class="rounded-2xl border border-white/15 bg-white/[.07] p-3 shadow-2xl backdrop-blur-sm">
                <div class="rounded-xl bg-white p-5 text-brand-950 sm:p-6">
                    <div class="flex items-center justify-between border-b border-neutral-200 pb-4"><span class="text-lg font-bold">ClinicSoft</span><span class="h-2.5 w-2.5 rounded-full bg-accent-500 shadow-[0_0_0_5px_rgb(31_157_111_/.12)]"></span></div>
                    <div class="my-5 grid grid-cols-3 gap-2" aria-hidden="true">
                        @foreach ([68, 84, 56] as $height)
                            <span class="relative h-20 overflow-hidden rounded-md bg-brand-50"><span class="absolute inset-x-2 bottom-2 rounded-sm bg-brand-500/70" style="height: {{ $height }}%"></span></span>
                        @endforeach
                    </div>
                    <a href="https://clinicsoft.tech/" target="_blank" rel="noopener noreferrer" class="group inline-flex min-h-12 w-full items-center justify-center gap-3 rounded-md bg-brand-950 px-5 text-sm font-semibold text-white transition hover:bg-brand-700 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-brand-600">
                        {{ __('home.software_button') }}
                        <svg class="h-4 w-4 transition-transform group-hover:translate-x-0.5 group-hover:-translate-y-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M13.5 6H18m0 0v4.5M18 6l-7.5 7.5M6 8.25v9.75h9.75"/></svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- Catalogue en ruban --}}
    @php
        $categories = \App\Models\Category::query()
            ->active()
            ->whereHas('products', fn ($query) => $query->published()->localStock())
            ->ordered()
            ->get();
    @endphp
    <section id="materiel" class="surface-white-cross relative scroll-mt-24 overflow-hidden py-24 sm:py-28">
        <div class="mx-auto max-w-7xl px-5 sm:px-8">
            <div class="grid items-end gap-8 lg:grid-cols-[1fr_auto]">
                <div><span class="section-index">02 / {{ __('home.equipment_eyebrow') }}</span><h2 class="mt-6 max-w-3xl text-3xl font-semibold tracking-[-.035em] text-brand-950 sm:text-5xl">{{ __('home.equipment_title') }}</h2><p class="mt-5 max-w-2xl leading-7 text-neutral-600">{{ __('home.equipment_description') }}</p></div>
                <a href="{{ route('catalog.index') }}" class="art-link">{{ __('home.equipment_cta') }} <span>↗</span></a>
            </div>
            @if ($categories->isNotEmpty())
                <div class="mt-14 grid gap-3">
                    @foreach ($categories as $category)
                        <a href="{{ route('catalog.index', ['category' => $category->slug]) }}" class="group grid grid-cols-[3rem_1fr_auto] items-center gap-4 rounded-xl border border-brand-900/10 bg-white/80 px-4 py-5 shadow-[0_12px_35px_-32px_rgb(7_27_52_/.8)] transition duration-300 hover:-translate-y-0.5 hover:border-brand-400 hover:bg-brand-50 sm:grid-cols-[5rem_1fr_auto] sm:px-6 sm:py-6">
                            <span class="font-mono text-xs text-neutral-400">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                            <span class="text-lg font-medium text-brand-950 transition group-hover:translate-x-2 group-hover:text-brand-600 sm:text-2xl">{{ t($category, 'name') }}</span>
                            <span class="grid h-10 w-10 place-items-center rounded-full border border-neutral-200 text-brand-700 transition group-hover:rotate-45 group-hover:border-brand-600 group-hover:bg-brand-600 group-hover:text-white">↗</span>
                        </a>
                    @endforeach
                </div>
            @else
                <x-empty-state :title="__('home.empty_products')" class="mt-12" />
            @endif
        </div>
    </section>

    {{-- Matériels vedettes --}}
    @if ($featuredProducts->isNotEmpty())
        <section class="surface-medical relative overflow-hidden py-24 sm:py-28">
            <div class="mx-auto max-w-7xl px-5 sm:px-8">
                <div class="flex flex-col justify-between gap-7 sm:flex-row sm:items-end">
                    <div>
                        <span class="section-index">03 / {{ __('home.featured_eyebrow') }}</span>
                        <h2 class="mt-6 max-w-3xl text-3xl font-semibold tracking-[-.035em] text-brand-950 sm:text-5xl">{{ __('home.featured_title') }}</h2>
                        <p class="mt-5 max-w-2xl leading-7 text-neutral-600">{{ __('home.featured_description') }}</p>
                    </div>
                    <a href="{{ route('catalog.index') }}" class="art-link">{{ __('home.equipment_cta') }} <span>↗</span></a>
                </div>

                <div class="mt-14 grid gap-5 md:grid-cols-2 lg:grid-cols-3">
                    @foreach ($featuredProducts as $product)
                        <article class="product-editorial group flex min-h-[460px] flex-col overflow-hidden rounded-2xl bg-white">
                            <a href="{{ route('catalog.show', $product) }}" class="relative block aspect-[4/3] overflow-hidden bg-brand-900">
                                @if ($product->main_image)
                                    <img src="{{ media_url($product->main_image) }}" alt="{{ t($product, 'name') }}" loading="lazy" class="h-full w-full object-cover transition duration-700 group-hover:scale-105">
                                @else
                                    <div class="hero-grid absolute inset-0 opacity-40"></div>
                                    <div class="absolute inset-0 grid place-items-center">
                                        <svg class="h-16 w-16 text-white/25" viewBox="0 0 100 100" fill="currentColor" aria-hidden="true"><path d="M42 16h16v26h26v16H58v26H42V58H16V42h26V16Z"/></svg>
                                    </div>
                                @endif
                                <span class="absolute left-4 top-4 bg-white px-3 py-1.5 text-[9px] font-bold uppercase tracking-[.18em] text-brand-800">{{ t($product->category, 'name') }}</span>
                            </a>
                            <div class="flex flex-1 flex-col p-6">
                                <h3 class="text-xl font-semibold tracking-tight text-brand-950"><a href="{{ route('catalog.show', $product) }}">{{ t($product, 'name') }}</a></h3>
                                @if (t($product, 'summary'))<p class="mt-3 line-clamp-3 flex-1 text-sm leading-6 text-neutral-600">{{ t($product, 'summary') }}</p>@endif
                                <div class="mt-6 flex items-center justify-between border-t border-neutral-200 pt-5">
                                    <a href="{{ route('catalog.show', $product) }}" class="text-xs font-semibold text-brand-800 hover:text-brand-600">{{ __('catalog.view_product') }}</a>
                                    <a href="{{ route('quote.create', ['product' => $product->slug]) }}" class="grid h-10 w-10 place-items-center rounded-full bg-brand-950 text-white transition group-hover:bg-accent-500 group-hover:text-brand-950" aria-label="{{ __('catalog.request_quote') }} — {{ t($product, 'name') }}">↗</a>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Services / continuum --}}
    <section id="services" class="surface-night section-diagonal-top relative scroll-mt-24 overflow-hidden py-24 text-white sm:py-28">
        <div class="mx-auto max-w-7xl px-5 sm:px-8">
            <div class="grid gap-12 lg:grid-cols-[.8fr_1.2fr] lg:gap-20">
                <div class="lg:sticky lg:top-28 lg:self-start"><span class="section-index !border-white/20 !text-brand-300">04 / {{ __('home.services_eyebrow') }}</span><h2 class="mt-7 text-3xl font-semibold tracking-[-.035em] sm:text-5xl">{{ __('home.services_title') }}</h2><p class="mt-5 max-w-md leading-7 text-white/65">{{ __('home.services_description') }}</p><a href="{{ route('services') }}" class="group mt-8 inline-flex items-center gap-3 rounded-md bg-accent-500 px-5 py-3 text-sm font-semibold text-brand-950 transition hover:bg-white"><span>{{ __('home.services_cta') }}</span><span class="transition-transform group-hover:translate-x-1">→</span></a></div>
                <div class="relative lg:pt-4">
                    @foreach (range(1, 4) as $step)
                        <article class="group relative mb-4 grid grid-cols-[2.75rem_1fr] gap-5 rounded-xl border border-white/10 bg-white/[.055] p-5 backdrop-blur-sm transition duration-300 last:mb-0 hover:-translate-y-0.5 hover:border-brand-400/40 hover:bg-white/[.085] sm:p-6">
                            <span class="relative z-10 grid h-11 w-11 place-items-center rounded-full border border-white/20 bg-brand-950 text-xs font-bold text-brand-200 transition group-hover:border-accent-500 group-hover:bg-accent-500 group-hover:text-brand-950">0{{ $step }}</span>
                            <div><h3 class="text-xl font-medium">{{ __("home.process_step_{$step}_title") }}</h3><p class="mt-2 max-w-lg text-sm leading-6 text-white/60">{{ __("home.process_step_{$step}_description") }}</p></div>
                        </article>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- Réalisations --}}
    <section id="realisations" class="surface-cloud section-arc-top relative scroll-mt-24 overflow-hidden py-24 sm:py-28">
        <div class="mx-auto max-w-7xl px-5 sm:px-8">
            <div class="flex flex-col justify-between gap-7 sm:flex-row sm:items-end"><div><span class="section-index">05 / {{ __('home.realisations_eyebrow') }}</span><h2 class="mt-6 text-3xl font-semibold tracking-[-.035em] text-brand-950 sm:text-5xl">{{ __('home.realisations_title') }}</h2></div><a class="art-link" href="{{ route('realisations.index') }}">{{ __('home.realisations_cta') }} <span>↗</span></a></div>
            @if ($featuredRealisations->isNotEmpty())
                <div class="mt-14 grid gap-6 md:grid-cols-12">
                    @foreach ($featuredRealisations as $realisation)
                        <a href="{{ route('realisations.show', $realisation) }}" class="project-tile group relative min-h-[320px] overflow-hidden rounded-2xl bg-brand-900 ring-1 ring-brand-950/5 {{ $loop->first ? 'md:col-span-7 md:min-h-[500px]' : 'md:col-span-5' }}">
                            @if ($realisation->main_image)<img src="{{ media_url($realisation->main_image) }}" alt="{{ t($realisation, 'title') }}" loading="lazy" class="absolute inset-0 h-full w-full object-cover opacity-65 transition duration-700 group-hover:scale-105">@else<div class="hero-grid absolute inset-0 opacity-30"></div>@endif
                            <div class="absolute inset-0 bg-gradient-to-t from-brand-950 via-brand-950/20 to-transparent"></div>
                            <div class="absolute inset-x-0 bottom-0 p-6 sm:p-8"><div class="flex items-center justify-between gap-4">@if ($realisation->city)<span class="rounded-full bg-accent-500/15 px-3 py-1.5 text-[10px] font-bold uppercase tracking-[.2em] text-accent-500 backdrop-blur">{{ $realisation->city }}</span>@endif<span class="grid h-10 w-10 place-items-center rounded-full border border-white/20 text-white transition group-hover:rotate-45 group-hover:bg-white group-hover:text-brand-950">↗</span></div><h3 class="mt-4 max-w-lg text-xl font-semibold text-white sm:text-2xl">{{ t($realisation, 'title') }}</h3></div>
                        </a>
                    @endforeach
                </div>
            @else
                <x-empty-state :title="__('home.empty_realisations')" class="mt-12" />
            @endif
        </div>
    </section>

    @if (filled(config('drc.trusted_organizations')) || $partners->isNotEmpty() || $testimonials->isNotEmpty() || $stats->isNotEmpty())
        <section id="partenaires" class="surface-white-cross relative scroll-mt-24 overflow-hidden py-24 sm:py-28">
            <div class="mx-auto max-w-7xl px-5 sm:px-8">
                @if ($stats->isNotEmpty())<div class="grid grid-cols-2 gap-3 border-b border-neutral-200 pb-16 md:grid-cols-4">@foreach ($stats as $stat)<div class="rounded-xl border border-brand-900/10 bg-brand-50/70 p-5 sm:p-6"><p class="text-4xl font-semibold tracking-tight text-brand-950 sm:text-5xl">{{ $stat->value }}</p><p class="mt-3 text-xs font-semibold uppercase tracking-wider text-neutral-500">{{ t($stat, 'label') }}</p></div>@endforeach</div>@endif
                <div class="pt-16">
                    <div class="mx-auto max-w-2xl text-center">
                        <span class="section-index">{{ __('home.partners_eyebrow') }}</span>
                        <h2 class="mt-6 text-3xl font-semibold tracking-[-.035em] text-brand-950 sm:text-4xl">{{ __('home.partners_title') }}</h2>
                        <p class="mt-4 text-sm leading-7 text-neutral-600">{{ __('home.partners_description') }}</p>
                    </div>
                    <div class="mx-auto mt-10 grid max-w-5xl grid-cols-2 items-stretch gap-3 sm:grid-cols-3 lg:grid-cols-4">
                        @foreach (config('drc.trusted_organizations', []) as $organization)
                            <div class="trust-logo-card group">
                                <img src="{{ asset($organization['logo']) }}" alt="{{ $organization['name'] }}" width="120" height="120" loading="lazy" class="max-h-20 max-w-[78%] object-contain transition-transform duration-300 group-hover:scale-105">
                                <span class="mt-3 text-center text-[10px] font-semibold uppercase tracking-[.12em] text-neutral-500">{{ $organization['name'] }}</span>
                            </div>
                        @endforeach
                        @foreach ($partners as $partner)
                            <div class="trust-logo-card group">
                                @if ($partner->logo)
                                    <img src="{{ media_url($partner->logo) }}" alt="{{ $partner->name }}" loading="lazy" class="max-h-20 max-w-[78%] object-contain transition-transform duration-300 group-hover:scale-105">
                                @else
                                    <span class="text-center text-sm font-semibold text-brand-900">{{ $partner->name }}</span>
                                @endif
                                @if ($partner->logo)<span class="mt-3 text-center text-[10px] font-semibold uppercase tracking-[.12em] text-neutral-500">{{ $partner->name }}</span>@endif
                            </div>
                        @endforeach
                    </div>
                </div>
                @if ($testimonials->isNotEmpty())<div class="mx-auto mt-20 max-w-4xl rounded-2xl border border-brand-900/10 bg-brand-50/70 px-6 py-12 text-center shadow-card sm:px-12" x-data="{ active: 0 }"><span class="mx-auto grid h-12 w-12 place-items-center rounded-full bg-brand-950 text-2xl text-white">“</span>@foreach ($testimonials as $testimonial)<blockquote x-cloak x-show="active === {{ $loop->index }}" class="mt-7 text-2xl font-medium leading-relaxed tracking-tight text-brand-950 sm:text-4xl">{{ t($testimonial, 'content') }}<footer class="mt-6 text-xs font-semibold uppercase tracking-[.18em] text-neutral-500">{{ $testimonial->name }}{{ $testimonial->institution ? ' · '.$testimonial->institution : '' }}</footer></blockquote>@endforeach @if($testimonials->count() > 1)<div class="mt-8 flex justify-center gap-2">@foreach($testimonials as $testimonial)<button class="h-1.5 w-8 rounded-full transition-colors" :class="active === {{ $loop->index }} ? 'bg-brand-700' : 'bg-neutral-300'" @click="active={{ $loop->index }}" aria-label="Témoignage {{ $loop->iteration }}"></button>@endforeach</div>@endif</div>@endif
            </div>
        </section>
    @endif

    <section class="team-showcase relative isolate overflow-hidden bg-brand-950 py-24 text-white sm:py-32" aria-labelledby="home-team-title">
        <div class="hero-grid absolute inset-0 opacity-20" aria-hidden="true"></div>
        <div class="absolute -right-40 -top-52 h-[34rem] w-[34rem] rounded-full border border-white/10" aria-hidden="true"></div>
        <div class="relative mx-auto max-w-7xl px-5 sm:px-8">
            <div class="grid items-end gap-8 border-b border-white/15 pb-10 lg:grid-cols-[1fr_.7fr]">
                <div>
                    <span class="section-index !border-white/20 !text-brand-300">06 / {{ __('home.team_eyebrow') }}</span>
                    <h2 id="home-team-title" class="mt-6 max-w-3xl text-3xl font-semibold leading-tight tracking-[-.04em] text-white sm:text-5xl">{{ __('home.team_title') }}</h2>
                </div>
                <div class="lg:pb-1">
                    <p class="max-w-xl text-sm leading-7 text-white/65 sm:text-base">{{ __('home.team_description') }}</p>
                    <a href="{{ route('about') }}" class="mt-6 inline-flex items-center gap-4 border-b border-accent-500 pb-2 text-sm font-semibold text-accent-500 transition hover:text-white">{{ __('home.team_cta') }} <span aria-hidden="true">↗</span></a>
                </div>
            </div>

            @if ($team->isNotEmpty())
                <div class="mt-12 grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
                    @foreach ($team as $member)
                        <article class="team-card group relative flex min-h-[390px] flex-col overflow-hidden rounded-2xl border border-white/10 bg-white/[.055] p-6 backdrop-blur-sm {{ $member->is_leadership ? 'sm:col-span-2 sm:row-span-2 lg:min-h-[520px]' : '' }}">
                            <div class="absolute right-4 top-3 font-mono text-[10px] tracking-[.16em] text-white/30">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</div>
                            <div class="flex flex-1 items-center justify-center py-7">
                                <x-team-avatar :member="$member" :size="$member->is_leadership ? 'xl' : 'lg'" class="!bg-brand-800 !text-brand-100 !ring-white/10 transition duration-500 group-hover:scale-105 group-hover:!ring-accent-500/40" />
                            </div>
                            @if ($member->is_leadership)
                                <span class="mb-3 w-fit rounded-full bg-accent-500/15 px-3 py-1 text-[9px] font-bold uppercase tracking-[.16em] text-accent-500">{{ __('home.team_leadership') }}</span>
                            @endif
                            <div class="border-t border-white/10 pt-5">
                                <div class="flex items-start justify-between gap-4">
                                    <div class="min-w-0">
                                        <h3 class="truncate text-lg font-semibold text-white">{{ $member->name }}</h3>
                                        <p class="mt-1 text-sm leading-6 text-brand-200">{{ t($member, 'role') }}</p>
                                    </div>
                                    @if ($member->linkedin_url)
                                        <a href="{{ $member->linkedin_url }}" target="_blank" rel="noopener noreferrer" class="grid h-9 w-9 shrink-0 place-items-center rounded-full border border-white/15 text-white/70 transition hover:border-[#0a66c2] hover:bg-[#0a66c2] hover:text-white" aria-label="{{ __('home.team_linkedin', ['name' => $member->name]) }}">
                                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M6.94 8.5H3.56V19h3.38V8.5ZM5.25 3A1.96 1.96 0 1 0 5.25 6.92 1.96 1.96 0 0 0 5.25 3ZM20.44 13c0-3.16-1.69-4.63-3.94-4.63-1.82 0-2.63 1-3.08 1.7V8.5h-3.38V19h3.38v-5.2c0-1.37.26-2.7 1.96-2.7 1.68 0 1.7 1.57 1.7 2.79V19h3.38L20.44 13Z"/></svg>
                                        </a>
                                    @endif
                                </div>
                                @if ($member->city)<p class="mt-4 text-[9px] font-semibold uppercase tracking-[.16em] text-white/40">{{ $member->city }}</p>@endif
                            </div>
                        </article>
                    @endforeach
                </div>
            @else
                <div class="mt-12 grid min-h-72 place-items-center border border-dashed border-white/20 bg-white/[.03] px-6 text-center">
                    <div><span class="text-5xl font-light text-accent-500">+</span><p class="mt-3 text-lg font-semibold">{{ __('home.team_empty_title') }}</p><p class="mx-auto mt-2 max-w-lg text-sm leading-6 text-white/55">{{ __('home.team_empty_description') }}</p></div>
                </div>
            @endif
        </div>
    </section>

    @if ($faqs->isNotEmpty())
        <section class="surface-medical relative overflow-hidden py-24">
            <div class="mx-auto grid max-w-7xl gap-12 px-5 sm:px-8 lg:grid-cols-[.72fr_1.28fr]">
                <div><span class="section-index">07 / FAQ</span><h2 class="mt-6 text-3xl font-semibold tracking-tight text-brand-950 sm:text-4xl">{{ __('home.faq_title') }}</h2></div>
                <div class="space-y-3">@foreach ($faqs as $faq)<div x-data="{ open: false }" class="rounded-xl border border-brand-900/10 bg-white/80 px-5 shadow-[0_15px_35px_-34px_rgb(7_27_52_/.9)] transition hover:border-brand-400 sm:px-6"><button type="button" @click="open=!open" :aria-expanded="open" class="flex w-full items-center justify-between gap-6 py-6 text-left"><span class="font-semibold text-brand-950">{{ t($faq, 'question') }}</span><span class="grid h-8 w-8 shrink-0 place-items-center rounded-full bg-brand-50 text-xl font-light text-brand-600" x-text="open ? '−' : '+'"></span></button><div x-cloak x-show="open" x-collapse class="max-w-2xl border-t border-brand-900/10 pb-6 pt-5 text-sm leading-7 text-neutral-600">{{ t($faq, 'answer') }}</div></div>@endforeach</div>
            </div>
        </section>
    @endif

    <section id="contact" class="relative scroll-mt-24 overflow-hidden bg-accent-500 py-20 text-brand-950">
        <div class="absolute -right-20 -top-40 text-[22rem] font-bold leading-none text-white/10" aria-hidden="true">+</div>
        <div class="relative mx-auto grid max-w-7xl gap-10 px-5 sm:px-8 lg:grid-cols-[1fr_.72fr] lg:items-center lg:gap-16">
            <div><span class="text-[10px] font-bold uppercase tracking-[.22em]">DRC CARE MEDICAL</span><h2 class="mt-5 max-w-3xl text-3xl font-semibold leading-tight tracking-[-.04em] sm:text-5xl">{{ __('home.cta_title') }}</h2><p class="mt-4 max-w-2xl leading-7 text-brand-950/70">{{ __('home.cta_description') }}</p><a href="{{ route('quote.create') }}" class="group mt-8 inline-flex min-h-14 items-center gap-5 rounded-md bg-brand-950 px-6 text-sm font-bold text-white shadow-xl transition hover:-translate-y-0.5 hover:bg-brand-800">{{ __('home.cta_button') }} <span class="text-xl transition-transform group-hover:translate-x-1">→</span></a></div>
            <div class="rounded-2xl border border-brand-950/10 bg-white/35 p-6 backdrop-blur-sm sm:p-8">
                <p class="text-xs font-bold uppercase tracking-[.18em] text-brand-950/55">{{ __('nav.contact') }}</p>
                <div class="mt-5 space-y-3">
                    @foreach (config('drc.company.phones') as $phone)
                        <a href="tel:{{ str_replace(' ', '', $phone) }}" class="flex items-center justify-between rounded-lg bg-white/65 px-4 py-3 text-sm font-semibold text-brand-950 transition hover:bg-white"><span>{{ $phone }}</span><span aria-hidden="true">↗</span></a>
                    @endforeach
                    <a href="mailto:{{ config('drc.company.email') }}" class="flex items-center justify-between rounded-lg bg-white/65 px-4 py-3 text-sm font-semibold text-brand-950 transition hover:bg-white"><span>{{ config('drc.company.email') }}</span><span aria-hidden="true">↗</span></a>
                </div>
            </div>
        </div>
    </section>

    {{-- Actions commerciales persistantes sur mobile --}}
    <div class="fixed inset-x-0 bottom-0 z-40 border-t border-white/15 bg-brand-950/95 p-2 pb-[max(.5rem,env(safe-area-inset-bottom))] shadow-[0_-8px_30px_rgba(7,27,52,.2)] backdrop-blur md:hidden">
        <div class="mx-auto grid max-w-md grid-cols-2 gap-2">
            <a href="tel:{{ str_replace(' ', '', config('drc.company.phone')) }}" class="inline-flex min-h-12 items-center justify-center gap-2 rounded-md border border-white/15 text-sm font-semibold text-white">
                <svg class="h-4 w-4 text-brand-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.362-.271.527-.734.417-1.173L6.963 3.102A1.125 1.125 0 0 0 5.872 2.25H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z"/></svg>
                {{ __('home.mobile_call') }}
            </a>
            <a href="{{ route('quote.create') }}" class="inline-flex min-h-12 items-center justify-center gap-2 rounded-md bg-accent-500 px-3 text-sm font-bold text-brand-950">{{ __('home.mobile_quote') }} <span aria-hidden="true">→</span></a>
        </div>
    </div>
</x-layouts.app>
