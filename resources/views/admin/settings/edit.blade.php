<x-layouts.admin title="Paramètres">
    <form method="POST" action="{{ route('admin.settings.update') }}" class="max-w-3xl space-y-6">
        @csrf
        @method('PUT')

        <div class="rounded-lg border border-neutral-200 bg-white p-6">
            <h2 class="text-sm font-semibold text-neutral-900">Coordonnées affichées sur le site</h2>
            <div class="mt-4 grid grid-cols-1 gap-5 sm:grid-cols-2">
                <x-form.input name="company_phone" label="Téléphone" :value="$settings['company_phone']" />
                <x-form.input type="email" name="company_email" label="Email" :value="$settings['company_email']" />
                <x-form.input type="url" name="facebook_url" label="Lien Facebook" :value="$settings['facebook_url']" />
            </div>
            <div class="mt-5">
                <x-form.textarea name="company_address" label="Adresse du siège" :value="$settings['company_address']" :rows="2" />
            </div>
        </div>

        <div class="rounded-lg border border-neutral-200 bg-white p-6">
            <h2 class="text-sm font-semibold text-neutral-900">Slogan du site</h2>
            <div class="mt-4 grid grid-cols-1 gap-5 sm:grid-cols-2">
                <x-form.input name="site_tagline_fr" label="Slogan (français)" :value="$settings['site_tagline_fr']" />
                <x-form.input name="site_tagline_en" label="Slogan (English)" :value="$settings['site_tagline_en']" />
            </div>
        </div>

        <div class="rounded-lg border border-neutral-200 bg-white p-6">
            <h2 class="text-sm font-semibold text-neutral-900">Description SEO par défaut</h2>
            <div class="mt-4 grid grid-cols-1 gap-5 sm:grid-cols-2">
                <x-form.textarea name="seo_default_description_fr" label="Description (français)" :value="$settings['seo_default_description_fr']" :rows="3" />
                <x-form.textarea name="seo_default_description_en" label="Description (English)" :value="$settings['seo_default_description_en']" :rows="3" />
            </div>
        </div>

        <x-button type="submit">Enregistrer</x-button>
    </form>
</x-layouts.admin>
