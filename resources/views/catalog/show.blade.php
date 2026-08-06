<x-layouts.app :title="t($product, 'seo_title') ?: t($product, 'name')" :description="t($product, 'seo_description') ?: t($product, 'summary')">
    <div class="mx-auto max-w-7xl px-4 pt-8 sm:px-6 lg:px-8">
        <x-breadcrumb :items="[
            ['label' => __('nav.catalog'), 'url' => route('catalog.index')],
            ['label' => t($product, 'name')],
        ]" />
    </div>

    <section class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 gap-10 lg:grid-cols-2">
            <div x-data="{ active: '{{ $product->main_image ? media_url($product->main_image) : '' }}' }">
                <div class="aspect-[4/3] overflow-hidden rounded-lg bg-neutral-100">
                    @if ($product->main_image)
                        <img :src="active" alt="{{ t($product, 'name') }}" class="h-full w-full object-cover">
                    @endif
                </div>
                @if ($product->images->isNotEmpty())
                    <div class="mt-4 grid grid-cols-5 gap-3">
                        @if ($product->main_image)
                            <button type="button" @click="active = '{{ media_url($product->main_image) }}'" class="aspect-square overflow-hidden rounded-md border border-neutral-200">
                                <img src="{{ media_url($product->main_image) }}" alt="" class="h-full w-full object-cover">
                            </button>
                        @endif
                        @foreach ($product->images as $image)
                            <button type="button" @click="active = '{{ media_url($image->path) }}'" class="aspect-square overflow-hidden rounded-md border border-neutral-200">
                                <img src="{{ media_url($image->path) }}" alt="{{ t($image, 'alt') }}" class="h-full w-full object-cover">
                            </button>
                        @endforeach
                    </div>
                @endif
            </div>

            <div>
                <p class="text-xs font-semibold uppercase tracking-wide text-brand-600">{{ t($product->category, 'name') }}</p>
                <h1 class="mt-1.5 text-2xl font-bold tracking-tight text-neutral-950 sm:text-3xl">{{ t($product, 'name') }}</h1>
                @if ($product->summary_fr)
                    <p class="mt-3 text-base leading-relaxed text-neutral-600">{{ t($product, 'summary') }}</p>
                @endif

                <dl class="mt-4 space-y-1 text-sm text-neutral-600">
                    @if ($product->reference)
                        <div class="flex gap-2"><dt class="font-medium text-neutral-800">{{ __('catalog.reference') }} :</dt><dd>{{ $product->reference }}</dd></div>
                    @endif
                    @if ($product->brand)
                        <div class="flex gap-2"><dt class="font-medium text-neutral-800">{{ __('catalog.brand') }} :</dt><dd>{{ $product->brand }}</dd></div>
                    @endif
                </dl>

                <div class="mt-6">
                    <x-button as="a" :href="route('quote.create', ['product' => $product->slug])" size="lg">{{ __('catalog.request_quote') }}</x-button>
                </div>

                @if ($product->description_fr)
                    <div class="mt-8">
                        <h2 class="text-sm font-semibold uppercase tracking-wide text-neutral-800">{{ __('catalog.description') }}</h2>
                        <p class="mt-2 whitespace-pre-line text-sm leading-relaxed text-neutral-600">{{ t($product, 'description') }}</p>
                    </div>
                @endif

                @if (! empty($product->specifications))
                    <div class="mt-8">
                        <h2 class="text-sm font-semibold uppercase tracking-wide text-neutral-800">{{ __('catalog.specifications') }}</h2>
                        <dl class="mt-3 divide-y divide-neutral-200 rounded-lg border border-neutral-200">
                            @foreach ($product->specifications as $label => $value)
                                <div class="flex justify-between gap-4 px-4 py-2.5 text-sm">
                                    <dt class="text-neutral-500">{{ $label }}</dt>
                                    <dd class="text-right font-medium text-neutral-800">{{ $value }}</dd>
                                </div>
                            @endforeach
                        </dl>
                    </div>
                @endif
            </div>
        </div>

        @if ($related->isNotEmpty())
            <div class="mt-16">
                <h2 class="text-lg font-bold text-neutral-900">{{ __('catalog.related_products') }}</h2>
                <div class="mt-6 grid grid-cols-1 gap-6 sm:grid-cols-3">
                    @foreach ($related as $relatedProduct)
                        <a href="{{ route('catalog.show', $relatedProduct) }}" class="group overflow-hidden rounded-lg border border-neutral-200">
                            <div class="aspect-[4/3] bg-neutral-100">
                                @if ($relatedProduct->main_image)
                                    <img src="{{ media_url($relatedProduct->main_image) }}" alt="{{ t($relatedProduct, 'name') }}" class="h-full w-full object-cover">
                                @endif
                            </div>
                            <p class="p-4 text-sm font-medium text-neutral-900 group-hover:text-brand-700">{{ t($relatedProduct, 'name') }}</p>
                        </a>
                    @endforeach
                </div>
            </div>
        @endif
    </section>
</x-layouts.app>
