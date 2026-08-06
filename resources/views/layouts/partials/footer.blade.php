<footer class="border-t border-neutral-100 bg-brand-950 text-neutral-300">
    <div class="mx-auto max-w-7xl px-4 py-14 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 gap-10 sm:grid-cols-2 lg:grid-cols-4">
            <div>
                <a href="{{ route('home') }}" class="flex items-center gap-2">
                    <span class="flex h-10 w-10 items-center justify-center rounded-md bg-white text-sm font-bold text-brand-900">DC</span>
                    <span class="text-sm font-bold tracking-tight text-white">DRC CARE MEDICAL</span>
                </a>
                <p class="mt-4 text-sm leading-relaxed text-neutral-400">{{ __('footer.about_excerpt') }}</p>
                <p class="mt-4 text-xs text-neutral-500">{{ __('footer.china_medical_care') }}</p>
            </div>

            <div>
                <h3 class="text-sm font-semibold text-white">{{ __('footer.quick_links') }}</h3>
                <ul class="mt-4 space-y-2.5 text-sm text-neutral-400">
                    <li><a href="{{ route('about') }}" class="hover:text-white">{{ __('nav.about') }}</a></li>
                    <li><a href="{{ route('services') }}" class="hover:text-white">{{ __('nav.services') }}</a></li>
                    <li><a href="{{ route('catalog.index') }}" class="hover:text-white">{{ __('nav.catalog') }}</a></li>
                    <li><a href="{{ route('realisations.index') }}" class="hover:text-white">{{ __('nav.realisations') }}</a></li>
                    <li><a href="{{ route('quote.create') }}" class="hover:text-white">{{ __('nav.quote_cta') }}</a></li>
                </ul>
            </div>

            <div>
                <h3 class="text-sm font-semibold text-white">{{ __('footer.services') }}</h3>
                <ul class="mt-4 space-y-2.5 text-sm text-neutral-400">
                    <li>{{ __('footer.service_supply') }}</li>
                    <li>{{ __('footer.service_logistics') }}</li>
                    <li>{{ __('footer.service_installation') }}</li>
                    <li>{{ __('footer.service_maintenance') }}</li>
                </ul>
                <h3 class="mt-6 text-sm font-semibold text-white">{{ __('footer.cities') }}</h3>
                <p class="mt-2 text-sm text-neutral-400">Lubumbashi · Kinshasa · Kasumbalesa · Kolwezi</p>
            </div>

            <div>
                <h3 class="text-sm font-semibold text-white">{{ __('nav.contact') }}</h3>
                <ul class="mt-4 space-y-2.5 text-sm text-neutral-400">
                    <li>{{ config('drc.company.address') }}</li>
                    <li><a href="tel:{{ str_replace(' ', '', config('drc.company.phone')) }}" class="hover:text-white">{{ config('drc.company.phone') }}</a></li>
                    <li><a href="mailto:{{ config('drc.company.email') }}" class="hover:text-white">{{ config('drc.company.email') }}</a></li>
                    <li>
                        <a href="{{ config('drc.company.facebook_url') }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1.5 hover:text-white">
                            Facebook
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="mt-12 flex flex-col gap-3 border-t border-white/10 pt-6 text-xs text-neutral-500 sm:flex-row sm:items-center sm:justify-between">
            <p>&copy; {{ now()->year }} DRC CARE MEDICAL. {{ __('footer.rights_reserved') }}</p>
            <div class="flex gap-4">
                <a href="{{ route('legal.terms') }}" class="hover:text-neutral-300">{{ __('footer.legal_terms') }}</a>
                <a href="{{ route('legal.privacy') }}" class="hover:text-neutral-300">{{ __('footer.privacy_policy') }}</a>
            </div>
        </div>
    </div>
</footer>
