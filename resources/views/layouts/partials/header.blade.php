<header
    x-data="{ mobileOpen: false, scrolled: false }"
    x-init="window.addEventListener('scroll', () => scrolled = window.scrollY > 12)"
    :class="scrolled ? 'shadow-soft' : ''"
    class="sticky top-0 z-40 border-b border-neutral-100 bg-white/95 backdrop-blur transition-shadow"
>
    <div class="mx-auto flex max-w-7xl items-center justify-between gap-4 px-4 py-3 sm:px-6 lg:px-8">
        <a href="{{ route('home') }}" class="flex items-center gap-2">
            <span class="flex h-10 w-10 items-center justify-center rounded-md bg-brand-900 text-sm font-bold text-white">DC</span>
            <span class="leading-tight">
                <span class="block text-sm font-bold tracking-tight text-brand-950">DRC CARE MEDICAL</span>
                <span class="block text-[11px] text-neutral-500">{{ __('nav.tagline') }}</span>
            </span>
        </a>

        <nav class="hidden items-center gap-7 lg:flex" aria-label="Navigation principale">
            <a href="{{ route('home') }}" class="text-sm font-medium text-neutral-700 hover:text-brand-700 {{ request()->routeIs('home') ? 'text-brand-700' : '' }}">{{ __('nav.home') }}</a>
            <a href="{{ route('about') }}" class="text-sm font-medium text-neutral-700 hover:text-brand-700 {{ request()->routeIs('about') ? 'text-brand-700' : '' }}">{{ __('nav.about') }}</a>
            <a href="{{ route('services') }}" class="text-sm font-medium text-neutral-700 hover:text-brand-700 {{ request()->routeIs('services') ? 'text-brand-700' : '' }}">{{ __('nav.services') }}</a>
            <a href="{{ route('catalog.index') }}" class="text-sm font-medium text-neutral-700 hover:text-brand-700 {{ request()->routeIs('catalog.*') ? 'text-brand-700' : '' }}">{{ __('nav.catalog') }}</a>
            <a href="{{ route('realisations.index') }}" class="text-sm font-medium text-neutral-700 hover:text-brand-700 {{ request()->routeIs('realisations.*') ? 'text-brand-700' : '' }}">{{ __('nav.realisations') }}</a>
            <a href="{{ route('partners.index') }}" class="text-sm font-medium text-neutral-700 hover:text-brand-700 {{ request()->routeIs('partners.*') ? 'text-brand-700' : '' }}">{{ __('nav.partners') }}</a>
            <a href="{{ route('contact.show') }}" class="text-sm font-medium text-neutral-700 hover:text-brand-700 {{ request()->routeIs('contact.*') ? 'text-brand-700' : '' }}">{{ __('nav.contact') }}</a>
        </nav>

        <div class="hidden items-center gap-3 lg:flex">
            <x-lang-switcher />
            <x-button as="a" :href="route('quote.create')" size="sm">{{ __('nav.quote_cta') }}</x-button>
        </div>

        <button
            type="button"
            @click="mobileOpen = !mobileOpen"
            class="inline-flex h-10 w-10 items-center justify-center rounded-md text-neutral-700 hover:bg-neutral-100 lg:hidden"
            :aria-expanded="mobileOpen"
            aria-controls="mobile-menu"
            aria-label="Ouvrir le menu"
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
        class="border-t border-neutral-100 lg:hidden"
    >
        <nav class="flex flex-col gap-1 px-4 py-3" aria-label="Navigation mobile">
            <a href="{{ route('home') }}" class="rounded-md px-3 py-2.5 text-sm font-medium text-neutral-700 hover:bg-neutral-50">{{ __('nav.home') }}</a>
            <a href="{{ route('about') }}" class="rounded-md px-3 py-2.5 text-sm font-medium text-neutral-700 hover:bg-neutral-50">{{ __('nav.about') }}</a>
            <a href="{{ route('services') }}" class="rounded-md px-3 py-2.5 text-sm font-medium text-neutral-700 hover:bg-neutral-50">{{ __('nav.services') }}</a>
            <a href="{{ route('catalog.index') }}" class="rounded-md px-3 py-2.5 text-sm font-medium text-neutral-700 hover:bg-neutral-50">{{ __('nav.catalog') }}</a>
            <a href="{{ route('realisations.index') }}" class="rounded-md px-3 py-2.5 text-sm font-medium text-neutral-700 hover:bg-neutral-50">{{ __('nav.realisations') }}</a>
            <a href="{{ route('partners.index') }}" class="rounded-md px-3 py-2.5 text-sm font-medium text-neutral-700 hover:bg-neutral-50">{{ __('nav.partners') }}</a>
            <a href="{{ route('contact.show') }}" class="rounded-md px-3 py-2.5 text-sm font-medium text-neutral-700 hover:bg-neutral-50">{{ __('nav.contact') }}</a>
            <div class="mt-2 flex items-center justify-between border-t border-neutral-100 px-3 pt-3">
                <x-lang-switcher />
                <x-button as="a" :href="route('quote.create')" size="sm">{{ __('nav.quote_cta') }}</x-button>
            </div>
        </nav>
    </div>
</header>
