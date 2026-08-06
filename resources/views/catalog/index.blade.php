<x-layouts.app :title="__('catalog.hero_title')" :description="__('catalog.hero_description')">
    <section class="bg-brand-950 py-16">
        <div class="mx-auto max-w-4xl px-4 text-center sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-white sm:text-4xl">{{ __('catalog.hero_title') }}</h1>
            <p class="mx-auto mt-4 max-w-2xl text-base text-brand-100">{{ __('catalog.hero_description') }}</p>
        </div>
    </section>

    <section class="mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8">
        <form method="GET" action="{{ route('catalog.index') }}" class="flex flex-col gap-4 sm:flex-row sm:items-end">
            <div class="flex-1">
                <label for="q" class="block text-sm font-medium text-neutral-800">{{ __('catalog.search_placeholder') }}</label>
                <input
                    type="search"
                    id="q"
                    name="q"
                    value="{{ request('q') }}"
                    placeholder="{{ __('catalog.search_placeholder') }}"
                    class="mt-1.5 block w-full rounded-md border border-neutral-300 px-3.5 py-2.5 text-sm focus:border-brand-600 focus:outline-none focus:ring-2 focus:ring-brand-100"
                >
            </div>
            <div class="sm:w-64">
                <label for="category" class="block text-sm font-medium text-neutral-800">{{ __('catalog.filter_category') }}</label>
                <select id="category" name="category" class="mt-1.5 block w-full rounded-md border border-neutral-300 bg-white px-3.5 py-2.5 text-sm focus:border-brand-600 focus:outline-none focus:ring-2 focus:ring-brand-100">
                    <option value="">{{ __('catalog.all_categories') }}</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->slug }}" @selected(request('category') === $category->slug)>{{ t($category, 'name') }}</option>
                    @endforeach
                </select>
            </div>
            <x-button type="submit">{{ __('catalog.hero_title') }}</x-button>
        </form>

        @if ($products->isEmpty())
            <x-empty-state :title="__('catalog.empty_title')" :description="__('catalog.empty_description')" class="mt-10" />
        @else
            <div class="mt-10 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($products as $product)
                    <div class="group flex flex-col overflow-hidden rounded-lg border border-neutral-200 bg-white">
                        <a href="{{ route('catalog.show', $product) }}" class="aspect-[4/3] bg-neutral-100">
                            @if ($product->main_image)
                                <img src="{{ media_url($product->main_image) }}" alt="{{ t($product, 'name') }}" class="h-full w-full object-cover" loading="lazy">
                            @endif
                        </a>
                        <div class="flex flex-1 flex-col p-5">
                            <p class="text-xs font-semibold uppercase tracking-wide text-brand-600">{{ t($product->category, 'name') }}</p>
                            <a href="{{ route('catalog.show', $product) }}" class="mt-1.5 text-sm font-semibold text-neutral-900 group-hover:text-brand-700">{{ t($product, 'name') }}</a>
                            @if ($product->summary_fr)
                                <p class="mt-2 flex-1 text-sm leading-relaxed text-neutral-600">{{ t($product, 'summary') }}</p>
                            @endif
                            <div class="mt-4 flex flex-wrap gap-2">
                                <x-button as="a" :href="route('catalog.show', $product)" variant="secondary" size="sm">{{ __('catalog.view_product') }}</x-button>
                                <x-button as="a" :href="route('quote.create', ['product' => $product->slug])" size="sm">{{ __('catalog.request_quote') }}</x-button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-10">
                {{ $products->links() }}
            </div>
        @endif
    </section>
</x-layouts.app>
