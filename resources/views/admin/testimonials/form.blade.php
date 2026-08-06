<x-layouts.admin :title="$testimonial->exists ? 'Modifier le témoignage' : 'Ajouter un témoignage'">
    <form
        method="POST"
        action="{{ $testimonial->exists ? route('admin.testimonials.update', $testimonial) : route('admin.testimonials.store') }}"
        enctype="multipart/form-data"
        class="max-w-3xl space-y-6"
    >
        @csrf
        @if ($testimonial->exists) @method('PUT') @endif

        <div class="rounded-lg border border-neutral-200 bg-white p-6">
            <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                <x-form.input name="name" label="Nom" :value="$testimonial->name" required />
                <x-form.input name="institution" label="Établissement" :value="$testimonial->institution" />
                <x-form.input name="role" label="Fonction" :value="$testimonial->role" />
                <x-form.input name="city" label="Ville" :value="$testimonial->city" />
            </div>
            <div class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-2">
                <x-form.textarea name="content_fr" label="Témoignage (français)" :value="$testimonial->content_fr" required />
                <x-form.textarea name="content_en" label="Témoignage (English)" :value="$testimonial->content_en" required />
            </div>
        </div>

        <div class="rounded-lg border border-neutral-200 bg-white p-6">
            <x-image-preview name="photo" label="Photo ou logo (facultatif)" :current="media_url($testimonial->photo)" />
            <div class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-3">
                <x-form.select name="rating" label="Note (facultative)" :value="$testimonial->rating" :options="[1 => '1', 2 => '2', 3 => '3', 4 => '4', 5 => '5']" placeholder="Aucune note" />
                <x-form.input type="number" name="order" label="Ordre d'affichage" :value="$testimonial->order ?? 0" min="0" />
                <label class="flex items-center gap-2 pt-7 text-sm text-neutral-700">
                    <input type="checkbox" name="is_published" value="1" @checked($testimonial->is_published ?? false) class="h-4 w-4 rounded border-neutral-300 text-brand-600 focus:ring-brand-500">
                    Publié sur le site
                </label>
            </div>
            <p class="mt-3 text-xs text-neutral-500">Ne publiez un témoignage qu'après validation explicite par l'établissement concerné.</p>
        </div>

        <div class="flex gap-3">
            <x-button type="submit">Enregistrer</x-button>
            <x-button as="a" :href="route('admin.testimonials.index')" variant="secondary">Annuler</x-button>
        </div>
    </form>
</x-layouts.admin>
