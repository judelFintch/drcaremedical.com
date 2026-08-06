<x-layouts.app :title="__('nav.home')">
    {{-- Hero éditorial — illustration vectorielle native, sans dépendance externe --}}
    <section class="hero-art relative isolate overflow-hidden bg-brand-950 text-white">
        <div class="hero-grid absolute inset-0 opacity-30" aria-hidden="true"></div>
        <div class="absolute -right-32 -top-40 h-[34rem] w-[34rem] rounded-full border border-white/10" aria-hidden="true"></div>
        <div class="absolute -right-8 -top-16 h-80 w-80 rounded-full border border-white/10" aria-hidden="true"></div>

        <div class="relative mx-auto grid max-w-7xl items-center gap-12 px-5 py-16 sm:px-8 sm:py-20 lg:min-h-[720px] lg:grid-cols-[1.06fr_.94fr] lg:px-8 lg:py-24">
            <div class="max-w-3xl">
                <div class="inline-flex items-center gap-3 rounded-full border border-white/15 bg-white/[.06] px-4 py-2 text-[11px] font-semibold uppercase tracking-[.2em] text-brand-100">
                    <span class="relative flex h-2 w-2"><span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-accent-500 opacity-60"></span><span class="relative h-2 w-2 rounded-full bg-accent-500"></span></span>
                    {{ __('home.hero_eyebrow') }}
                </div>
                <h1 class="mt-7 max-w-3xl text-[clamp(2.7rem,6vw,5.7rem)] font-semibold leading-[.96] tracking-[-.055em] text-white">
                    {{ __('home.hero_title') }}
                </h1>
                <p class="mt-7 max-w-2xl text-base leading-8 text-white/68 sm:text-lg">{{ __('home.hero_description') }}</p>
                <div class="mt-9 flex flex-col gap-3 sm:flex-row">
                    <a href="{{ route('quote.create') }}" class="group inline-flex min-h-13 items-center justify-center gap-3 rounded-md bg-white px-6 py-3.5 text-sm font-semibold text-brand-950 transition hover:bg-brand-50">
                        {{ __('home.hero_cta_primary') }}
                        <svg class="h-4 w-4 transition-transform group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M5 12h14m-6-6 6 6-6 6"/></svg>
                    </a>
                    <a href="{{ route('services') }}" class="inline-flex min-h-13 items-center justify-center rounded-md border border-white/20 px-6 py-3.5 text-sm font-semibold text-white transition hover:border-white/40 hover:bg-white/[.06]">{{ __('home.hero_cta_secondary') }}</a>
                </div>
                <div class="mt-11 flex max-w-xl items-start gap-4 border-l border-accent-500/70 pl-5">
                    <span class="mt-1 text-[10px] font-bold uppercase tracking-[.2em] text-accent-500">CMC</span>
                    <p class="text-sm leading-6 text-brand-100">{{ __('home.hero_trust') }}</p>
                </div>
            </div>

            <div class="relative mx-auto w-full max-w-xl lg:max-w-none">
                <div class="relative ml-auto aspect-[4/5] max-h-[590px] overflow-hidden border border-white/10 bg-brand-900 shadow-[0_35px_100px_rgba(0,0,0,.32)]">
                    <img src="{{ asset('images/site/medical-equipment-hero.webp') }}" alt="{{ __('home.hero_image_alt') }}" width="1800" height="1200" fetchpriority="high" class="h-full w-full object-cover object-[68%_center]">
                    <div class="absolute inset-0 bg-gradient-to-t from-brand-950/80 via-transparent to-brand-950/10"></div>
                    <div class="absolute inset-x-0 bottom-0 grid grid-cols-2 border-t border-white/15 bg-brand-950/60 backdrop-blur-md">
                        <div class="border-r border-white/15 p-4 sm:p-5"><span class="block text-[9px] font-bold uppercase tracking-[.2em] text-brand-300">China</span><span class="mt-1 block text-xs font-semibold text-white sm:text-sm">{{ __('home.hero_supply_label') }}</span></div>
                        <div class="p-4 sm:p-5"><span class="block text-[9px] font-bold uppercase tracking-[.2em] text-accent-500">RDC</span><span class="mt-1 block text-xs font-semibold text-white sm:text-sm">{{ __('home.hero_install_label') }}</span></div>
                    </div>
                </div>
                <div class="absolute -left-4 top-8 hidden h-24 w-24 items-center justify-center rounded-full border border-white/20 bg-brand-950/85 backdrop-blur sm:flex">
                    <img src="{{ asset('images/brand/drc-care-medical-logo.webp') }}" alt="" width="72" height="72" class="h-16 w-16 rounded-full object-cover">
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
    <section class="relative overflow-hidden bg-[#f7fafc] py-24 sm:py-32">
        <div class="mx-auto grid max-w-7xl gap-14 px-5 sm:px-8 lg:grid-cols-[.72fr_1.28fr] lg:gap-24">
            <div>
                <span class="section-index">01 / DRC CARE</span>
                <p class="mt-7 max-w-xs text-xs font-semibold uppercase leading-6 tracking-[.2em] text-brand-700">{{ __('home.intro_eyebrow') }}</p>
            </div>
            <div>
                <h2 class="max-w-4xl text-3xl font-semibold leading-tight tracking-[-.035em] text-brand-950 sm:text-5xl">{{ __('home.intro_title') }}</h2>
                <p class="mt-8 max-w-3xl text-lg leading-8 text-neutral-700">{{ __('home.intro_description') }}</p>
                <div class="mt-12 grid gap-8 border-t border-neutral-200 pt-8 sm:grid-cols-2">
                    <div><span class="text-sm font-bold text-accent-600">China Medical Care</span><h3 class="mt-3 text-xl font-semibold text-brand-950">{{ __('home.china_title') }}</h3></div>
                    <p class="text-sm leading-7 text-neutral-600">{{ __('home.china_description') }}</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Mise en avant institutionnelle de la maison mère --}}
    <aside class="parent-company-spotlight relative overflow-hidden bg-white" aria-labelledby="parent-company-title">
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
            <div class="relative min-h-48 overflow-hidden bg-brand-950 lg:min-h-0 lg:bg-transparent">
                <div class="hero-grid absolute inset-0 opacity-40 lg:hidden" aria-hidden="true"></div>
                <div class="absolute inset-0 flex items-center justify-center lg:hidden" aria-hidden="true"><span class="grid h-28 w-28 place-items-center rounded-full border border-white/20 text-3xl font-semibold text-white">CMC</span></div>
            </div>
        </div>
    </aside>

    {{-- Catalogue en ruban --}}
    @php
        $categories = \App\Models\Category::query()
            ->active()
            ->whereHas('products', fn ($query) => $query->published()->localStock())
            ->ordered()
            ->get();
    @endphp
    <section class="py-24 sm:py-28">
        <div class="mx-auto max-w-7xl px-5 sm:px-8">
            <div class="grid items-end gap-8 lg:grid-cols-[1fr_auto]">
                <div><span class="section-index">02 / {{ __('home.equipment_eyebrow') }}</span><h2 class="mt-6 max-w-3xl text-3xl font-semibold tracking-[-.035em] text-brand-950 sm:text-5xl">{{ __('home.equipment_title') }}</h2><p class="mt-5 max-w-2xl leading-7 text-neutral-600">{{ __('home.equipment_description') }}</p></div>
                <a href="{{ route('catalog.index') }}" class="art-link">{{ __('home.equipment_cta') }} <span>↗</span></a>
            </div>
            @if ($categories->isNotEmpty())
                <div class="mt-14 border-y border-neutral-200">
                    @foreach ($categories as $category)
                        <a href="{{ route('catalog.index', ['category' => $category->slug]) }}" class="group grid grid-cols-[3rem_1fr_auto] items-center gap-4 border-b border-neutral-200 py-5 last:border-0 sm:grid-cols-[5rem_1fr_auto] sm:py-6">
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
        <section class="overflow-hidden bg-brand-50 py-24 sm:py-28">
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
                        <article class="product-editorial group flex min-h-[460px] flex-col overflow-hidden bg-white">
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
    <section class="overflow-hidden bg-brand-950 py-24 text-white sm:py-28">
        <div class="mx-auto max-w-7xl px-5 sm:px-8">
            <div class="grid gap-10 lg:grid-cols-[.8fr_1.2fr]">
                <div><span class="section-index !border-white/20 !text-brand-300">03 / {{ __('home.services_eyebrow') }}</span><h2 class="mt-7 text-3xl font-semibold tracking-[-.035em] sm:text-5xl">{{ __('home.services_title') }}</h2><p class="mt-5 max-w-md leading-7 text-white/60">{{ __('home.services_description') }}</p><a href="{{ route('services') }}" class="mt-8 inline-flex border-b border-accent-500 pb-1 text-sm font-semibold text-accent-500">{{ __('home.services_cta') }} ↗</a></div>
                <div class="relative lg:pt-4">
                    <div class="absolute bottom-6 left-[19px] top-6 w-px bg-gradient-to-b from-accent-500 via-brand-500 to-white/10" aria-hidden="true"></div>
                    @foreach (range(1, 4) as $step)
                        <article class="group relative grid grid-cols-[2.5rem_1fr] gap-5 pb-10 last:pb-0">
                            <span class="relative z-10 grid h-10 w-10 place-items-center rounded-full border border-white/20 bg-brand-950 text-xs font-bold text-brand-200 transition group-hover:border-accent-500 group-hover:bg-accent-500 group-hover:text-brand-950">{{ $step }}</span>
                            <div class="border-b border-white/10 pb-9"><h3 class="text-xl font-medium">{{ __("home.process_step_{$step}_title") }}</h3><p class="mt-2 max-w-lg text-sm leading-6 text-white/55">{{ __("home.process_step_{$step}_description") }}</p></div>
                        </article>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- Réalisations --}}
    <section class="bg-[#f7fafc] py-24 sm:py-28">
        <div class="mx-auto max-w-7xl px-5 sm:px-8">
            <div class="flex flex-col justify-between gap-7 sm:flex-row sm:items-end"><div><span class="section-index">04 / {{ __('home.realisations_eyebrow') }}</span><h2 class="mt-6 text-3xl font-semibold tracking-[-.035em] text-brand-950 sm:text-5xl">{{ __('home.realisations_title') }}</h2></div><a class="art-link" href="{{ route('realisations.index') }}">{{ __('home.realisations_cta') }} <span>↗</span></a></div>
            @if ($featuredRealisations->isNotEmpty())
                <div class="mt-14 grid gap-6 md:grid-cols-12">
                    @foreach ($featuredRealisations as $realisation)
                        <a href="{{ route('realisations.show', $realisation) }}" class="project-tile group relative min-h-[320px] overflow-hidden bg-brand-900 {{ $loop->first ? 'md:col-span-7 md:min-h-[500px]' : 'md:col-span-5' }}">
                            @if ($realisation->main_image)<img src="{{ media_url($realisation->main_image) }}" alt="{{ t($realisation, 'title') }}" loading="lazy" class="absolute inset-0 h-full w-full object-cover opacity-65 transition duration-700 group-hover:scale-105">@else<div class="hero-grid absolute inset-0 opacity-30"></div>@endif
                            <div class="absolute inset-0 bg-gradient-to-t from-brand-950 via-brand-950/20 to-transparent"></div>
                            <div class="absolute inset-x-0 bottom-0 p-6 sm:p-8">@if ($realisation->city)<span class="text-[10px] font-bold uppercase tracking-[.2em] text-accent-500">{{ $realisation->city }}</span>@endif<h3 class="mt-2 max-w-lg text-xl font-semibold text-white sm:text-2xl">{{ t($realisation, 'title') }}</h3></div>
                        </a>
                    @endforeach
                </div>
            @else
                <x-empty-state :title="__('home.empty_realisations')" class="mt-12" />
            @endif
        </div>
    </section>

    @if ($partners->isNotEmpty() || $testimonials->isNotEmpty() || $stats->isNotEmpty())
        <section class="py-24 sm:py-28">
            <div class="mx-auto max-w-7xl px-5 sm:px-8">
                @if ($stats->isNotEmpty())<div class="grid grid-cols-2 gap-y-10 border-b border-neutral-200 pb-16 md:grid-cols-4">@foreach ($stats as $stat)<div class="border-l border-neutral-200 pl-5"><p class="text-4xl font-semibold tracking-tight text-brand-950 sm:text-5xl">{{ $stat->value }}</p><p class="mt-2 text-xs uppercase tracking-wider text-neutral-500">{{ t($stat, 'label') }}</p></div>@endforeach</div>@endif
                @if ($partners->isNotEmpty())<div class="pt-16"><p class="text-center text-[10px] font-bold uppercase tracking-[.25em] text-neutral-500">{{ __('home.partners_title') }}</p><div class="mt-9 grid grid-cols-2 items-center gap-4 sm:grid-cols-4">@foreach ($partners as $partner)<div class="flex h-20 items-center justify-center border border-neutral-200 px-5">@if ($partner->logo)<img src="{{ media_url($partner->logo) }}" alt="{{ $partner->name }}" loading="lazy" class="max-h-11 max-w-full object-contain grayscale transition hover:grayscale-0">@else<span class="text-center text-sm font-semibold text-neutral-500">{{ $partner->name }}</span>@endif</div>@endforeach</div></div>@endif
                @if ($testimonials->isNotEmpty())<div class="mx-auto mt-20 max-w-4xl text-center" x-data="{ active: 0 }">@foreach ($testimonials as $testimonial)<blockquote x-cloak x-show="active === {{ $loop->index }}" class="text-2xl font-medium leading-relaxed tracking-tight text-brand-950 sm:text-4xl">“{{ t($testimonial, 'content') }}”<footer class="mt-6 text-xs font-semibold uppercase tracking-[.18em] text-neutral-500">{{ $testimonial->name }}{{ $testimonial->institution ? ' · '.$testimonial->institution : '' }}</footer></blockquote>@endforeach @if($testimonials->count() > 1)<div class="mt-8 flex justify-center gap-2">@foreach($testimonials as $testimonial)<button class="h-1.5 w-8 transition-colors" :class="active === {{ $loop->index }} ? 'bg-brand-700' : 'bg-neutral-200'" @click="active={{ $loop->index }}" aria-label="Témoignage {{ $loop->iteration }}"></button>@endforeach</div>@endif</div>@endif
            </div>
        </section>
    @endif

    @if ($faqs->isNotEmpty())
        <section class="bg-brand-50 py-24">
            <div class="mx-auto grid max-w-7xl gap-12 px-5 sm:px-8 lg:grid-cols-[.72fr_1.28fr]">
                <div><span class="section-index">05 / FAQ</span><h2 class="mt-6 text-3xl font-semibold tracking-tight text-brand-950 sm:text-4xl">{{ __('home.faq_title') }}</h2></div>
                <div class="border-t border-brand-900/15">@foreach ($faqs as $faq)<div x-data="{ open: false }" class="border-b border-brand-900/15"><button type="button" @click="open=!open" :aria-expanded="open" class="flex w-full items-center justify-between gap-6 py-6 text-left"><span class="font-semibold text-brand-950">{{ t($faq, 'question') }}</span><span class="text-2xl font-light text-brand-600" x-text="open ? '−' : '+'"></span></button><div x-cloak x-show="open" x-collapse class="max-w-2xl pb-6 text-sm leading-7 text-neutral-600">{{ t($faq, 'answer') }}</div></div>@endforeach</div>
            </div>
        </section>
    @endif

    <section class="relative overflow-hidden bg-accent-500 py-20 text-brand-950">
        <div class="absolute -right-20 -top-40 text-[22rem] font-bold leading-none text-white/10" aria-hidden="true">+</div>
        <div class="relative mx-auto flex max-w-7xl flex-col justify-between gap-9 px-5 sm:px-8 lg:flex-row lg:items-end">
            <div><span class="text-[10px] font-bold uppercase tracking-[.22em]">DRC CARE MEDICAL</span><h2 class="mt-5 max-w-3xl text-3xl font-semibold leading-tight tracking-[-.04em] sm:text-5xl">{{ __('home.cta_title') }}</h2><p class="mt-4 max-w-2xl leading-7 text-brand-950/70">{{ __('home.cta_description') }}</p></div>
            <a href="{{ route('quote.create') }}" class="group inline-flex shrink-0 items-center gap-5 self-start border-b-2 border-brand-950 pb-2 text-sm font-bold lg:self-auto">{{ __('home.cta_button') }} <span class="text-xl transition-transform group-hover:translate-x-1">→</span></a>
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
