<x-layouts.app :title="t($realisation, 'seo_title') ?: t($realisation, 'title')" :description="t($realisation, 'seo_description') ?: t($realisation, 'summary')">
    <div class="mx-auto max-w-5xl px-4 pt-8 sm:px-6 lg:px-8">
        <x-breadcrumb :items="[
            ['label' => __('nav.realisations'), 'url' => route('realisations.index')],
            ['label' => t($realisation, 'title')],
        ]" />
    </div>

    <section class="mx-auto max-w-5xl px-4 py-8 sm:px-6 lg:px-8">
        <div class="flex flex-wrap items-center gap-3">
            @if ($realisation->city)
                <x-badge color="blue">{{ $realisation->city }}</x-badge>
            @endif
            @if ($realisation->realised_at)
                <span class="text-sm text-neutral-500">{{ $realisation->realised_at->translatedFormat('F Y') }}</span>
            @endif
        </div>
        <h1 class="mt-3 text-2xl font-bold tracking-tight text-neutral-950 sm:text-3xl">{{ t($realisation, 'title') }}</h1>
        @if ($realisation->summary_fr)
            <p class="mt-3 text-base leading-relaxed text-neutral-600">{{ t($realisation, 'summary') }}</p>
        @endif

        @if ($realisation->main_image)
            <div class="mt-8 aspect-[16/9] overflow-hidden rounded-lg bg-neutral-100">
                <img src="{{ media_url($realisation->main_image) }}" alt="{{ t($realisation, 'title') }}" class="h-full w-full object-cover">
            </div>
        @endif

        @if ($realisation->description_fr)
            <div class="mt-8 whitespace-pre-line text-sm leading-relaxed text-neutral-700">{{ t($realisation, 'description') }}</div>
        @endif

        @if ($realisation->equipment_fr)
            <div class="mt-6 rounded-lg bg-brand-50 p-4">
                <p class="text-xs font-semibold uppercase tracking-wide text-brand-600">{{ __('realisations.equipment_used') }}</p>
                <p class="mt-1 text-sm text-neutral-700">{{ t($realisation, 'equipment') }}</p>
            </div>
        @endif

        @if ($realisation->images->isNotEmpty())
            <div class="mt-10 grid grid-cols-2 gap-3 sm:grid-cols-3">
                @foreach ($realisation->images as $image)
                    <div class="aspect-square overflow-hidden rounded-md bg-neutral-100">
                        <img src="{{ media_url($image->path) }}" alt="{{ t($image, 'alt') }}" class="h-full w-full object-cover" loading="lazy">
                    </div>
                @endforeach
            </div>
        @endif
    </section>
</x-layouts.app>
