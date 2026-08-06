<x-layouts.admin :title="$category->exists ? 'Modifier la catégorie' : 'Ajouter une catégorie'">
    <form
        method="POST"
        action="{{ $category->exists ? route('admin.categories.update', $category) : route('admin.categories.store') }}"
        enctype="multipart/form-data"
        class="max-w-3xl space-y-6"
    >
        @csrf
        @if ($category->exists) @method('PUT') @endif

        <div class="rounded-lg border border-neutral-200 bg-white p-6">
            <h2 class="text-sm font-semibold text-neutral-900">Contenu bilingue</h2>
            <div class="mt-4 grid grid-cols-1 gap-5 sm:grid-cols-2">
                <x-form.input name="name_fr" label="Nom (français)" :value="$category->name_fr" required />
                <x-form.input name="name_en" label="Name (English)" :value="$category->name_en" required />
                <x-form.textarea name="description_fr" label="Description (français)" :value="$category->description_fr" :rows="3" />
                <x-form.textarea name="description_en" label="Description (English)" :value="$category->description_en" :rows="3" />
            </div>
        </div>

        <div class="rounded-lg border border-neutral-200 bg-white p-6">
            <h2 class="text-sm font-semibold text-neutral-900">Image et affichage</h2>
            <div class="mt-4 space-y-5">
                <x-image-preview name="image" label="Image de la catégorie" :current="media_url($category->image)" />
                <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                    <x-form.input type="number" name="order" label="Ordre d'affichage" :value="$category->order ?? 0" min="0" />
                    <label class="flex items-center gap-2 pt-7 text-sm text-neutral-700">
                        <input type="checkbox" name="is_active" value="1" @checked($category->is_active ?? true) class="h-4 w-4 rounded border-neutral-300 text-brand-600 focus:ring-brand-500">
                        Catégorie active (visible sur le site)
                    </label>
                </div>
            </div>
        </div>

        <div class="flex gap-3">
            <x-button type="submit">Enregistrer</x-button>
            <x-button as="a" :href="route('admin.categories.index')" variant="secondary">Annuler</x-button>
        </div>
    </form>
</x-layouts.admin>
