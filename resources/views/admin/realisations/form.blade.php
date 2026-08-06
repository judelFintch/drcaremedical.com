<x-layouts.admin :title="$realisation->exists ? 'Modifier la réalisation' : 'Ajouter une réalisation'">
    <form
        method="POST"
        action="{{ $realisation->exists ? route('admin.realisations.update', $realisation) : route('admin.realisations.store') }}"
        enctype="multipart/form-data"
        class="max-w-4xl space-y-6"
    >
        @csrf
        @if ($realisation->exists) @method('PUT') @endif

        <div class="rounded-lg border border-neutral-200 bg-white p-6">
            <h2 class="text-sm font-semibold text-neutral-900">Informations générales</h2>
            <div class="mt-4 grid grid-cols-1 gap-5 sm:grid-cols-2">
                <x-form.input name="title_fr" label="Titre (français)" :value="$realisation->title_fr" required />
                <x-form.input name="title_en" label="Title (English)" :value="$realisation->title_en" required />
                <x-form.input name="client_name" label="Établissement (si publication autorisée)" :value="$realisation->client_name" help="Laisser vide si la publication du nom n'est pas confirmée." />
                <x-form.input name="city" label="Ville" :value="$realisation->city" />
                <x-form.input type="date" name="realised_at" label="Date de réalisation" :value="$realisation->realised_at?->format('Y-m-d')" />
                <x-form.select name="status" label="Statut" required :value="$realisation->status?->value" :options="['draft' => 'Brouillon', 'published' => 'Publié']" />
            </div>
            <div class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-2">
                <x-form.input name="summary_fr" label="Résumé (français)" :value="$realisation->summary_fr" />
                <x-form.input name="summary_en" label="Summary (English)" :value="$realisation->summary_en" />
                <x-form.input name="equipment_fr" label="Matériel concerné (français)" :value="$realisation->equipment_fr" />
                <x-form.input name="equipment_en" label="Equipment involved (English)" :value="$realisation->equipment_en" />
            </div>
            <div class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-2">
                <x-form.textarea name="description_fr" label="Description détaillée (français)" :value="$realisation->description_fr" :rows="5" />
                <x-form.textarea name="description_en" label="Detailed description (English)" :value="$realisation->description_en" :rows="5" />
            </div>
        </div>

        <div class="rounded-lg border border-neutral-200 bg-white p-6">
            <h2 class="text-sm font-semibold text-neutral-900">Images</h2>
            <div class="mt-4">
                <x-image-preview name="main_image" label="Image principale" :current="media_url($realisation->main_image)" />
            </div>

            @if ($realisation->exists && $realisation->images->isNotEmpty())
                <div class="mt-6">
                    <p class="text-sm font-medium text-neutral-800">Galerie actuelle</p>
                    <div class="mt-2 grid grid-cols-4 gap-3 sm:grid-cols-6">
                        @foreach ($realisation->images as $image)
                            <div class="group relative aspect-square overflow-hidden rounded-md border border-neutral-200">
                                <img src="{{ media_url($image->path) }}" alt="" class="h-full w-full object-cover">
                                <form method="POST" action="{{ route('admin.realisations.images.destroy', [$realisation, $image]) }}" class="absolute inset-0 flex items-center justify-center bg-neutral-900/60 opacity-0 transition-opacity group-hover:opacity-100">
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
            <h2 class="text-sm font-semibold text-neutral-900">SEO</h2>
            <div class="mt-4 grid grid-cols-1 gap-5 sm:grid-cols-2">
                <x-form.input name="seo_title_fr" label="Titre SEO (français)" :value="$realisation->seo_title_fr" />
                <x-form.input name="seo_title_en" label="Titre SEO (English)" :value="$realisation->seo_title_en" />
                <x-form.textarea name="seo_description_fr" label="Description SEO (français)" :value="$realisation->seo_description_fr" :rows="2" />
                <x-form.textarea name="seo_description_en" label="Description SEO (English)" :value="$realisation->seo_description_en" :rows="2" />
            </div>
        </div>

        <div class="flex gap-3">
            <x-button type="submit">Enregistrer</x-button>
            <x-button as="a" :href="route('admin.realisations.index')" variant="secondary">Annuler</x-button>
        </div>
    </form>
</x-layouts.admin>
