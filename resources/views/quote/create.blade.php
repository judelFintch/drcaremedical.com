<x-layouts.app :title="__('nav.quote_cta')">
    <section class="bg-brand-950 py-16">
        <div class="mx-auto max-w-4xl px-4 text-center sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-white sm:text-4xl">{{ __('nav.quote_cta') }}</h1>
        </div>
    </section>

    <section class="mx-auto max-w-3xl px-4 py-16 sm:px-6 lg:px-8">
        @if (session('status'))
            <x-alert type="success" class="mb-6">{{ session('status') }}</x-alert>
        @endif

        @if ($product)
            <div class="mb-6 flex items-center gap-4 rounded-lg border border-brand-200 bg-brand-50 p-4">
                <div class="h-16 w-16 shrink-0 overflow-hidden rounded-md bg-white">
                    @if ($product->main_image)
                        <img src="{{ media_url($product->main_image) }}" alt="{{ t($product, 'name') }}" class="h-full w-full object-cover">
                    @endif
                </div>
                <div>
                    <p class="text-xs font-semibold uppercase tracking-wide text-brand-600">{{ __('forms.product_concerned') }}</p>
                    <p class="text-sm font-semibold text-neutral-900">{{ t($product, 'name') }}</p>
                </div>
            </div>
        @endif

        <form method="POST" action="{{ route('quote.store') }}" enctype="multipart/form-data" class="relative space-y-5" novalidate>
            @csrf
            <x-honeypot />

            @if ($product)
                <input type="hidden" name="product_id" value="{{ $product->id }}">
            @endif

            <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                <x-form.input name="name" :label="__('forms.name')" required />
                <x-form.input name="institution" :label="__('forms.institution')" />
            </div>
            <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                <x-form.input name="role" :label="__('forms.role')" />
                <x-form.input name="city" :label="__('forms.city')" />
            </div>
            <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                <x-form.input type="email" name="email" :label="__('forms.email')" required />
                <x-form.input type="tel" name="phone" :label="__('forms.phone')" />
            </div>
            <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                <x-form.input type="number" name="quantity" :label="__('forms.quantity')" min="1" />
                <x-form.input name="deadline" :label="__('forms.deadline')" />
            </div>
            <x-form.textarea name="message" :label="__('forms.message')" required />

            <div>
                <label for="attachment" class="block text-sm font-medium text-neutral-800">{{ __('forms.attachment') }}</label>
                <input type="file" id="attachment" name="attachment" accept=".pdf,.jpg,.jpeg,.png" class="mt-1.5 block w-full text-sm text-neutral-600 file:mr-4 file:rounded-md file:border-0 file:bg-brand-50 file:px-4 file:py-2 file:text-sm file:font-medium file:text-brand-700 hover:file:bg-brand-100">
                <p class="mt-1 text-xs text-neutral-500">{{ __('forms.attachment_help') }}</p>
                @error('attachment')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <x-form.checkbox name="consent" :label="__('forms.consent')" required />

            <x-button type="submit" size="lg">{{ __('forms.submit_quote') }}</x-button>
        </form>
    </section>
</x-layouts.app>
