<x-layouts.app :title="__('nav.contact')">
    <section class="bg-brand-950 py-16">
        <div class="mx-auto max-w-4xl px-4 text-center sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-white sm:text-4xl">{{ __('nav.contact') }}</h1>
        </div>
    </section>

    <section class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 gap-12 lg:grid-cols-3">
            <div class="lg:col-span-2">
                @if (session('status'))
                    <x-alert type="success" class="mb-6">{{ session('status') }}</x-alert>
                @endif

                <form method="POST" action="{{ route('contact.store') }}" class="relative space-y-5" novalidate>
                    @csrf
                    <x-honeypot />

                    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                        <x-form.input name="name" :label="__('forms.name')" required />
                        <x-form.input name="institution" :label="__('forms.institution')" />
                    </div>
                    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                        <x-form.input name="city" :label="__('forms.city')" />
                        <x-form.select name="need_type" :label="__('forms.need_type')" :options="collect($needTypes)->mapWithKeys(fn ($t) => [$t->value => $t->label()])" :placeholder="__('forms.need_type_placeholder')" required />
                    </div>
                    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                        <x-form.input type="email" name="email" :label="__('forms.email')" required />
                        <x-form.input type="tel" name="phone" :label="__('forms.phone')" />
                    </div>
                    <x-form.textarea name="message" :label="__('forms.message')" required />
                    <x-form.checkbox name="consent" :label="__('forms.consent')" required />

                    <x-button type="submit" size="lg">{{ __('forms.submit_contact') }}</x-button>
                </form>
            </div>

            <div class="space-y-6">
                <x-card>
                    <p class="text-sm font-semibold text-neutral-900">DRC CARE MEDICAL</p>
                    <p class="mt-2 text-sm text-neutral-600">{{ config('drc.company.address') }}</p>
                    <div class="mt-2 space-y-1 text-sm">
                        @foreach (config('drc.company.phones') as $phone)
                            <p><a href="tel:{{ str_replace(' ', '', $phone) }}" class="text-brand-700 hover:underline">{{ $phone }}</a></p>
                        @endforeach
                    </div>
                    <p class="mt-1 text-sm"><a href="mailto:{{ config('drc.company.email') }}" class="text-brand-700 hover:underline">{{ config('drc.company.email') }}</a></p>
                    <p class="mt-3 text-sm">
                        <a href="{{ config('drc.company.facebook_url') }}" target="_blank" rel="noopener noreferrer" class="text-brand-700 hover:underline">Facebook</a>
                    </p>
                </x-card>

                @foreach ($agencies as $agency)
                    <x-card>
                        <p class="text-sm font-semibold text-neutral-900">{{ $agency->city }}</p>
                        <p class="mt-1 text-sm text-neutral-600">{{ $agency->address }}</p>
                        @if ($agency->hours)
                            <p class="mt-1 text-xs text-neutral-500">{{ $agency->hours }}</p>
                        @endif
                    </x-card>
                @endforeach
            </div>
        </div>
    </section>
</x-layouts.app>
