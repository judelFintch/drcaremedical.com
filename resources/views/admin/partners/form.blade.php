<x-layouts.admin :title="$partner->exists ? 'Modifier le partenaire' : 'Ajouter un partenaire'">
    <form
        method="POST"
        action="{{ $partner->exists ? route('admin.partners.update', $partner) : route('admin.partners.store') }}"
        enctype="multipart/form-data"
        class="max-w-3xl space-y-6"
    >
        @csrf
        @if ($partner->exists) @method('PUT') @endif

        <div class="rounded-lg border border-neutral-200 bg-white p-6">
            <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                <x-form.input name="name" label="Nom du partenaire" :value="$partner->name" required />
                <x-form.input name="type" label="Type de partenariat" :value="$partner->type" help="Ex : Établissement médical partenaire, fournisseur logistique…" />
                <x-form.input type="url" name="website" label="Site web (facultatif)" :value="$partner->website" />
            </div>
            <div class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-2">
                <x-form.textarea name="description_fr" label="Description (français)" :value="$partner->description_fr" :rows="3" />
                <x-form.textarea name="description_en" label="Description (English)" :value="$partner->description_en" :rows="3" />
            </div>
        </div>

        <div class="rounded-lg border border-neutral-200 bg-white p-6">
            <x-image-preview name="logo" label="Logo" :current="media_url($partner->logo)" help="Fond clair recommandé, format PNG/SVG de préférence." />
            <div class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-2">
                <x-form.input type="number" name="order" label="Ordre d'affichage" :value="$partner->order ?? 0" min="0" />
                <label class="flex items-center gap-2 pt-7 text-sm text-neutral-700">
                    <input type="checkbox" name="is_published" value="1" @checked($partner->is_published ?? true) class="h-4 w-4 rounded border-neutral-300 text-brand-600 focus:ring-brand-500">
                    Publié sur le site
                </label>
            </div>
        </div>

        <div class="flex gap-3">
            <x-button type="submit">Enregistrer</x-button>
            <x-button as="a" :href="route('admin.partners.index')" variant="secondary">Annuler</x-button>
        </div>
    </form>
</x-layouts.admin>
