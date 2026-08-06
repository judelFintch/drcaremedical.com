<header
    x-data="{ mobileOpen: false, scrolled: false }"
    x-init="window.addEventListener('scroll', () => scrolled = window.scrollY > 12); window.addEventListener('resize', () => { if (window.innerWidth >= 1280) mobileOpen = false })"
    @keydown.escape.window="mobileOpen = false"
    :class="scrolled ? 'shadow-soft' : ''"
    class="sticky top-0 z-40 border-b border-neutral-100 bg-white/95 backdrop-blur transition-shadow"
>
    <div class="mx-auto flex max-w-7xl items-center justify-between gap-4 px-4 py-3 sm:px-6 lg:px-8">
        <a href="{{ route('home') }}" class="flex min-w-0 shrink-0 items-center gap-2.5" aria-label="DRC CARE MEDICAL — {{ __('nav.home') }}">
            <span class="h-11 w-11 shrink-0 overflow-hidden rounded-md bg-black ring-1 ring-brand-900/10">
                <img src="{{ asset('images/brand/drc-care-medical-logo.webp') }}" alt="" width="44" height="44" class="h-full w-full object-cover">
            </span>
            <span class="min-w-0 leading-tight">
                <span class="block text-sm font-bold tracking-tight text-brand-950">DRC CARE MEDICAL</span>
                <span class="hidden text-[11px] text-neutral-500 sm:block">{{ __('nav.tagline') }}</span>
            </span>
        </a>

        <nav class="hidden min-w-0 items-center gap-4 xl:flex 2xl:gap-6" aria-label="Navigation principale">
            <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'nav-link-active' : '' }}">{{ __('nav.home') }}</a>
            <a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') ? 'nav-link-active' : '' }}">{{ __('nav.about') }}</a>
            <a href="{{ route('services') }}" class="nav-link {{ request()->routeIs('services') ? 'nav-link-active' : '' }}">{{ __('nav.services') }}</a>
            <a href="{{ route('catalog.index') }}" class="nav-link {{ request()->routeIs('catalog.*') ? 'nav-link-active' : '' }}">{{ __('nav.catalog') }}</a>
            <a href="{{ route('realisations.index') }}" class="nav-link {{ request()->routeIs('realisations.*') ? 'nav-link-active' : '' }}">{{ __('nav.realisations') }}</a>
            <a href="{{ route('partners.index') }}" class="nav-link {{ request()->routeIs('partners.*') ? 'nav-link-active' : '' }}">{{ __('nav.partners') }}</a>
            <a href="{{ route('contact.show') }}" class="nav-link {{ request()->routeIs('contact.*') ? 'nav-link-active' : '' }}">{{ __('nav.contact') }}</a>
        </nav>

        <div class="hidden shrink-0 items-center gap-2 xl:flex">
            <x-lang-switcher />
            <x-button as="a" :href="route('quote.create')" size="sm" class="whitespace-nowrap">{{ __('nav.quote_cta') }}</x-button>
        </div>

        <button
            type="button"
            @click="mobileOpen = !mobileOpen"
            class="inline-flex h-11 w-11 shrink-0 items-center justify-center rounded-md border border-neutral-200 text-neutral-700 transition hover:border-brand-200 hover:bg-brand-50 hover:text-brand-800 xl:hidden"
            :aria-expanded="mobileOpen"
            aria-controls="mobile-menu"
            :aria-label="mobileOpen ? 'Fermer le menu' : 'Ouvrir le menu'"
        >
            <svg x-show="!mobileOpen" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <svg x-cloak x-show="mobileOpen" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    <div
        id="mobile-menu"
        x-cloak
        x-show="mobileOpen"
        x-collapse
        class="max-h-[calc(100vh-4.25rem)] overflow-y-auto border-t border-neutral-100 bg-white xl:hidden"
    >
        <nav class="flex flex-col gap-1 px-4 py-3" aria-label="Navigation mobile">
            <a href="{{ route('home') }}" class="rounded-md px-3 py-2.5 text-sm font-medium {{ request()->routeIs('home') ? 'bg-brand-50 text-brand-800' : 'text-neutral-700 hover:bg-neutral-50' }}">{{ __('nav.home') }}</a>
            <a href="{{ route('about') }}" class="rounded-md px-3 py-2.5 text-sm font-medium {{ request()->routeIs('about') ? 'bg-brand-50 text-brand-800' : 'text-neutral-700 hover:bg-neutral-50' }}">{{ __('nav.about') }}</a>
            <a href="{{ route('services') }}" class="rounded-md px-3 py-2.5 text-sm font-medium {{ request()->routeIs('services') ? 'bg-brand-50 text-brand-800' : 'text-neutral-700 hover:bg-neutral-50' }}">{{ __('nav.services') }}</a>
            <a href="{{ route('catalog.index') }}" class="rounded-md px-3 py-2.5 text-sm font-medium {{ request()->routeIs('catalog.*') ? 'bg-brand-50 text-brand-800' : 'text-neutral-700 hover:bg-neutral-50' }}">{{ __('nav.catalog') }}</a>
            <a href="{{ route('realisations.index') }}" class="rounded-md px-3 py-2.5 text-sm font-medium {{ request()->routeIs('realisations.*') ? 'bg-brand-50 text-brand-800' : 'text-neutral-700 hover:bg-neutral-50' }}">{{ __('nav.realisations') }}</a>
            <a href="{{ route('partners.index') }}" class="rounded-md px-3 py-2.5 text-sm font-medium {{ request()->routeIs('partners.*') ? 'bg-brand-50 text-brand-800' : 'text-neutral-700 hover:bg-neutral-50' }}">{{ __('nav.partners') }}</a>
            <a href="{{ route('contact.show') }}" class="rounded-md px-3 py-2.5 text-sm font-medium {{ request()->routeIs('contact.*') ? 'bg-brand-50 text-brand-800' : 'text-neutral-700 hover:bg-neutral-50' }}">{{ __('nav.contact') }}</a>
            <div class="mt-2 flex items-center justify-between border-t border-neutral-100 px-3 pt-3">
                <x-lang-switcher />
                <x-button as="a" :href="route('quote.create')" size="sm">{{ __('nav.quote_cta') }}</x-button>
            </div>
        </nav>
    </div>
</header>
