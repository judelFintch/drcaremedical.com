<header
    x-data="{
        mobileOpen: false,
        scrolled: false,
        active: 'accueil',
        init() {
            this.scrolled = window.scrollY > 16;
            const sections = ['accueil', 'a-propos', 'services', 'materiel', 'realisations', 'partenaires', 'contact'];
            const observer = new IntersectionObserver((entries) => {
                entries.forEach((entry) => { if (entry.isIntersecting) this.active = entry.target.id });
            }, { rootMargin: '-28% 0px -62% 0px', threshold: 0 });
            sections.forEach((id) => { const section = document.getElementById(id); if (section) observer.observe(section); });
        }
    }"
    @scroll.window="scrolled = window.scrollY > 16"
    @resize.window="if (window.innerWidth >= 1280) mobileOpen = false"
    @keydown.escape.window="mobileOpen = false"
    class="sticky top-0 z-40"
>
    <div class="hidden bg-brand-950 text-white lg:block">
        <div class="mx-auto flex h-8 max-w-7xl items-center justify-between px-8 text-[10px] font-medium uppercase tracking-[.12em] text-white/65">
            <p>{{ __('nav.tagline') }}</p>
            <div class="flex items-center gap-5">
                @foreach (config('drc.company.phones') as $phone)
                    <a href="tel:{{ str_replace(' ', '', $phone) }}" class="transition hover:text-white">{{ $phone }}</a>
                @endforeach
                <a href="mailto:{{ config('drc.company.email') }}" class="transition hover:text-white">{{ config('drc.company.email') }}</a>
            </div>
        </div>
    </div>

    <div :class="scrolled ? 'border-neutral-200 bg-white/98 shadow-[0_12px_35px_-24px_rgb(7_27_52_/.35)]' : 'border-neutral-100 bg-white/95'" class="border-b backdrop-blur-xl transition-all duration-300">
        <div :class="scrolled ? 'py-2' : 'py-3'" class="mx-auto flex max-w-7xl items-center justify-between gap-5 px-4 transition-all duration-300 sm:px-6 lg:px-8">
            <a href="{{ route('home') }}#accueil" class="group flex min-w-0 shrink-0 items-center gap-3" aria-label="DRC CARE MEDICAL — {{ __('nav.home') }}">
                <span :class="scrolled ? 'h-10 w-10' : 'h-11 w-11'" class="shrink-0 overflow-hidden rounded-xl bg-brand-950 shadow-sm ring-1 ring-brand-900/10 transition-all duration-300 group-hover:ring-brand-400">
                    <img src="{{ asset('images/brand/drc-care-medical-logo.webp') }}" alt="" width="44" height="44" class="h-full w-full object-cover">
                </span>
                <span class="min-w-0 leading-tight">
                    <span class="block text-sm font-bold tracking-[-.02em] text-brand-950">DRC CARE MEDICAL</span>
                    <span class="hidden text-[10px] font-medium uppercase tracking-[.12em] text-neutral-500 sm:block">China Medical Care · RDC</span>
                </span>
            </a>

            @php
                $onePageLinks = [
                    'accueil' => __('nav.home'),
                    'a-propos' => __('nav.about'),
                    'services' => __('nav.services'),
                    'materiel' => __('nav.catalog'),
                    'realisations' => __('nav.realisations'),
                    'partenaires' => __('nav.partners'),
                    'contact' => __('nav.contact'),
                ];
            @endphp
            <nav class="hidden min-w-0 items-center gap-1 xl:flex" aria-label="Navigation principale">
                @foreach ($onePageLinks as $anchor => $label)
                    <a
                        href="{{ route('home') }}#{{ $anchor }}"
                        class="relative rounded-md px-3 py-2 text-[13px] font-medium transition-colors"
                        :class="active === '{{ $anchor }}' ? 'bg-brand-50 text-brand-700' : 'text-neutral-600 hover:bg-neutral-50 hover:text-brand-800'"
                    >
                        {{ $label }}
                        <span x-show="active === '{{ $anchor }}'" class="absolute inset-x-3 -bottom-px h-0.5 rounded-full bg-accent-500"></span>
                    </a>
                @endforeach
            </nav>

            <div class="hidden shrink-0 items-center gap-3 xl:flex">
                <x-lang-switcher />
                <a href="{{ route('quote.create') }}" class="group inline-flex min-h-10 items-center gap-2 rounded-lg bg-brand-950 px-4 text-xs font-bold text-white shadow-sm transition hover:-translate-y-0.5 hover:bg-brand-700">
                    {{ __('nav.quote_cta') }}
                    <span class="transition-transform group-hover:translate-x-0.5">→</span>
                </a>
            </div>

            <button
                type="button"
                @click="mobileOpen = !mobileOpen"
                class="inline-flex h-11 w-11 shrink-0 items-center justify-center rounded-xl border border-neutral-200 bg-white text-brand-950 shadow-sm transition hover:border-brand-300 hover:bg-brand-50 xl:hidden"
                :aria-expanded="mobileOpen"
                aria-controls="mobile-menu"
                :aria-label="mobileOpen ? '{{ __('nav.close_menu') }}' : '{{ __('nav.open_menu') }}'"
            >
                <svg x-show="!mobileOpen" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 7h16M4 12h16M4 17h16" /></svg>
                <svg x-cloak x-show="mobileOpen" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M6 18L18 6M6 6l12 12" /></svg>
            </button>
        </div>
    </div>

    <div id="mobile-menu" x-cloak x-show="mobileOpen" x-collapse class="absolute inset-x-0 border-b border-neutral-200 bg-white/98 shadow-xl backdrop-blur-xl xl:hidden">
        <nav class="mx-auto max-h-[calc(100vh-5rem)] max-w-7xl overflow-y-auto px-4 py-4 sm:px-6" aria-label="Navigation mobile">
            <div class="grid gap-1 sm:grid-cols-2">
                @foreach ($onePageLinks as $anchor => $label)
                    <a @click="mobileOpen = false" href="{{ route('home') }}#{{ $anchor }}" class="flex items-center justify-between rounded-xl px-4 py-3 text-sm font-semibold transition" :class="active === '{{ $anchor }}' ? 'bg-brand-950 text-white' : 'text-neutral-700 hover:bg-brand-50 hover:text-brand-800'">
                        <span>{{ $label }}</span><span class="text-base opacity-60">→</span>
                    </a>
                @endforeach
            </div>
            <div class="mt-4 flex items-center justify-between gap-4 rounded-xl bg-brand-50 p-3">
                <x-lang-switcher />
                <a href="{{ route('quote.create') }}" class="inline-flex min-h-10 items-center gap-2 rounded-lg bg-accent-500 px-4 text-xs font-bold text-brand-950">{{ __('nav.quote_cta') }} <span>→</span></a>
            </div>
            <div class="mt-3 grid gap-1 px-2 text-xs text-neutral-500 sm:grid-cols-2">
                @foreach (config('drc.company.phones') as $phone)
                    <a href="tel:{{ str_replace(' ', '', $phone) }}" class="py-1 hover:text-brand-700">{{ $phone }}</a>
                @endforeach
            </div>
        </nav>
    </div>
</header>
