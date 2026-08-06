@php
    $specRows = collect($product->specifications ?? [])->map(fn ($value, $label) => ['label' => $label, 'value' => $value])->values();
@endphp

<x-layouts.admin :title="$product->exists ? 'Modifier le produit' : 'Ajouter un produit'">
    <form
        method="POST"
        action="{{ $product->exists ? route('admin.products.update', $product) : route('admin.products.store') }}"
        enctype="multipart/form-data"
        class="max-w-4xl space-y-6"
    >
        @csrf
        @if ($product->exists) @method('PUT') @endif

        <div class="rounded-lg border border-neutral-200 bg-white p-6">
            <h2 class="text-sm font-semibold text-neutral-900">Informations générales</h2>
            <div class="mt-4 grid grid-cols-1 gap-5 sm:grid-cols-2">
                <x-form.select name="category_id" label="Catégorie" required :value="$product->category_id" :options="$categories->pluck('name_fr', 'id')" placeholder="Sélectionnez une catégorie" />
                <x-form.select name="status" label="Statut" required :value="$product->status?->value" :options="['draft' => 'Brouillon', 'published' => 'Publié']" />
                <x-form.input name="name_fr" label="Nom (français)" :value="$product->name_fr" required />
                <x-form.input name="name_en" label="Name (English)" :value="$product->name_en" required />
                <x-form.input name="summary_fr" label="Résumé (français)" :value="$product->summary_fr" />
                <x-form.input name="summary_en" label="Summary (English)" :value="$product->summary_en" />
                <x-form.input name="reference" label="Référence (facultative)" :value="$product->reference" />
                <x-form.input name="brand" label="Marque (facultative)" :value="$product->brand" />
            </div>
            <div class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-2">
                <x-form.textarea name="description_fr" label="Description (français)" :value="$product->description_fr" :rows="5" />
                <x-form.textarea name="description_en" label="Description (English)" :value="$product->description_en" :rows="5" />
            </div>
        </div>

        <div class="rounded-lg border border-neutral-200 bg-white p-6" x-data="{ specs: @js($specRows->isNotEmpty() ? $specRows : [['label' => '', 'value' => '']]) }">
            <div class="flex items-center justify-between">
                <h2 class="text-sm font-semibold text-neutral-900">Caractéristiques techniques</h2>
                <button type="button" @click="specs.push({ label: '', value: '' })" class="text-sm font-medium text-brand-700 hover:underline">+ Ajouter une ligne</button>
            </div>
            <div class="mt-4 space-y-3">
                <template x-for="(spec, index) in specs" :key="index">
                    <div class="flex items-center gap-3">
                        <input type="text" :name="`spec_labels[${index}]`" x-model="spec.label" placeholder="Libellé (ex : Alimentation)" class="w-1/2 rounded-md border border-neutral-300 px-3 py-2 text-sm focus:border-brand-600 focus:outline-none focus:ring-2 focus:ring-brand-100">
                        <input type="text" :name="`spec_values[${index}]`" x-model="spec.value" placeholder="Valeur (ex : 220V / 50Hz)" class="w-1/2 rounded-md border border-neutral-300 px-3 py-2 text-sm focus:border-brand-600 focus:outline-none focus:ring-2 focus:ring-brand-100">
                        <button type="button" @click="specs.splice(index, 1)" class="shrink-0 text-neutral-400 hover:text-red-600" aria-label="Supprimer la ligne">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 18L18 6M6 6l12 12" /></svg>
                        </button>
                    </div>
                </template>
            </div>
        </div>

        <div class="rounded-lg border border-neutral-200 bg-white p-6">
            <h2 class="text-sm font-semibold text-neutral-900">Images</h2>
            <div class="mt-4">
                <x-image-preview name="main_image" label="Image principale" :current="media_url($product->main_image)" />
            </div>

            @if ($product->exists && $product->images->isNotEmpty())
                <div class="mt-6">
                    <p class="text-sm font-medium text-neutral-800">Galerie actuelle</p>
                    <div class="mt-2 grid grid-cols-4 gap-3 sm:grid-cols-6">
                        @foreach ($product->images as $image)
                            <div class="group relative aspect-square overflow-hidden rounded-md border border-neutral-200">
                                <img src="{{ media_url($image->path) }}" alt="" class="h-full w-full object-cover">
                                <form method="POST" action="{{ route('admin.products.images.destroy', [$product, $image]) }}" class="absolute inset-0 flex items-center justify-center bg-neutral-900/60 opacity-0 transition-opacity group-hover:opacity-100">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-xs font-medium text-white">Supprimer</button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <div class="mt-6">
                <label for="gallery" class="block text-sm font-medium text-neutral-800">Ajouter des images à la galerie</label>
                <input type="file" id="gallery" name="gallery[]" multiple accept="image/png,image/jpeg,image/webp" class="mt-1.5 block w-full text-sm text-neutral-600 file:mr-4 file:rounded-md file:border-0 file:bg-brand-50 file:px-4 file:py-2 file:text-sm file:font-medium file:text-brand-700 hover:file:bg-brand-100">
            </div>
        </div>

        <div class="rounded-lg border border-neutral-200 bg-white p-6">
            <h2 class="text-sm font-semibold text-neutral-900">Affichage et SEO</h2>
            <div class="mt-4 grid grid-cols-1 gap-5 sm:grid-cols-2">
                <x-form.input type="number" name="order" label="Ordre d'affichage" :value="$product->order ?? 0" min="0" />
                <label class="flex items-center gap-2 pt-7 text-sm text-neutral-700">
                    <input type="checkbox" name="is_featured" value="1" @checked($product->is_featured ?? false) class="h-4 w-4 rounded border-neutral-300 text-brand-600 focus:ring-brand-500">
                    Mettre en avant sur l'accueil
                </label>
                <x-form.input name="seo_title_fr" label="Titre SEO (français)" :value="$product->seo_title_fr" />
                <x-form.input name="seo_title_en" label="Titre SEO (English)" :value="$product->seo_title_en" />
                <x-form.textarea name="seo_description_fr" label="Description SEO (français)" :value="$product->seo_description_fr" :rows="2" />
                <x-form.textarea name="seo_description_en" label="Description SEO (English)" :value="$product->seo_description_en" :rows="2" />
            </div>
        </div>

        <div class="flex gap-3">
            <x-button type="submit">Enregistrer</x-button>
            <x-button as="a" :href="route('admin.products.index')" variant="secondary">Annuler</x-button>
        </div>
    </form>
</x-layouts.admin>
