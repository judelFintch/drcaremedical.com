<x-layouts.app :title="__('nav.about')" :description="__('about.hero_description')">
    <section class="bg-brand-950 py-16">
        <div class="mx-auto max-w-4xl px-4 text-center sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-white sm:text-4xl">{{ __('about.hero_title') }}</h1>
            <p class="mx-auto mt-4 max-w-2xl text-base text-brand-100">{{ __('about.hero_description') }}</p>
        </div>
    </section>

    <section class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 gap-8 sm:grid-cols-2">
            <x-card>
                <p class="text-sm font-semibold uppercase tracking-wide text-brand-600">{{ __('about.mission_title') }}</p>
                <p class="mt-3 text-base leading-relaxed text-neutral-700">{{ __('about.mission_description') }}</p>
            </x-card>
            <x-card>
                <p class="text-sm font-semibold uppercase tracking-wide text-brand-600">{{ __('about.vision_title') }}</p>
                <p class="mt-3 text-base leading-relaxed text-neutral-700">{{ __('about.vision_description') }}</p>
            </x-card>
        </div>
    </section>

    <section class="bg-neutral-50 py-16">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <x-section-title :title="__('about.values_title')" align="center" class="mx-auto" />
            <div class="mt-10 grid grid-cols-1 gap-6 sm:grid-cols-3">
                @foreach ([1, 2, 3] as $i)
                    <div class="rounded-lg border border-neutral-200 bg-white p-6 text-center">
                        <p class="text-sm font-semibold text-neutral-900">{{ __("about.value_{$i}_title") }}</p>
                        <p class="mt-2 text-sm leading-relaxed text-neutral-600">{{ __("about.value_{$i}_description") }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
        <x-section-title :title="__('about.presence_title')" align="center" class="mx-auto" />
        <div class="mt-10 grid grid-cols-1 gap-6 sm:grid-cols-2">
            @forelse ($agencies as $agency)
                <x-card>
                    <p class="text-sm font-semibold text-neutral-900">{{ $agency->city }}</p>
                    <p class="mt-1 text-sm text-neutral-600">{{ $agency->address }}</p>
                    @if ($agency->phone)
                        <p class="mt-1 text-sm text-neutral-600"><a href="tel:{{ str_replace(' ', '', $agency->phone) }}" class="hover:text-brand-700">{{ $agency->phone }}</a></p>
                    @endif
                </x-card>
            @empty
                <x-empty-state title="Points de présence à venir" class="sm:col-span-2" />
            @endforelse
        </div>
    </section>

    @if ($team->isNotEmpty())
        <section class="bg-neutral-50 py-16">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <x-section-title :title="__('about.team_title')" align="center" class="mx-auto" />
                <div class="mt-10 grid grid-cols-2 gap-6 sm:grid-cols-3 lg:grid-cols-4">
                    @foreach ($team as $member)
                        <div class="text-center">
                            <x-team-avatar :member="$member" size="lg" />
                            <p class="mt-3 text-sm font-semibold text-neutral-900">{{ $member->name }}</p>
                            <p class="text-xs text-neutral-500">{{ t($member, 'role') }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
</x-layouts.app>
