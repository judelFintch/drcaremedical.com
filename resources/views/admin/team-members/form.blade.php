<x-layouts.admin :title="$member->exists ? 'Modifier le membre' : 'Ajouter un membre'">
    <form
        method="POST"
        action="{{ $member->exists ? route('admin.team-members.update', $member) : route('admin.team-members.store') }}"
        enctype="multipart/form-data"
        class="max-w-3xl space-y-6"
    >
        @csrf
        @if ($member->exists) @method('PUT') @endif

        <div class="rounded-lg border border-neutral-200 bg-white p-6">
            <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                <x-form.input name="name" label="Nom complet" :value="$member->name" required />
                <x-form.input name="city" label="Ville" :value="$member->city" />
                <x-form.input name="role_fr" label="Fonction (français)" :value="$member->role_fr" required />
                <x-form.input name="role_en" label="Fonction (English)" :value="$member->role_en" required />
            </div>
            <div class="mt-5">
                <x-form.textarea name="bio" label="Biographie courte" :value="$member->bio" :rows="3" />
            </div>
        </div>

        <div class="rounded-lg border border-neutral-200 bg-white p-6">
            <x-image-preview name="photo" label="Photo" :current="media_url($member->photo)" />
            <div class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-2">
                <x-form.input type="number" name="order" label="Ordre d'affichage" :value="$member->order ?? 0" min="0" />
                <label class="flex items-center gap-2 pt-7 text-sm text-neutral-700">
                    <input type="checkbox" name="is_published" value="1" @checked($member->is_published ?? true) class="h-4 w-4 rounded border-neutral-300 text-brand-600 focus:ring-brand-500">
                    Publié sur le site
                </label>
            </div>
        </div>

        <div class="flex gap-3">
            <x-button type="submit">Enregistrer</x-button>
            <x-button as="a" :href="route('admin.team-members.index')" variant="secondary">Annuler</x-button>
        </div>
    </form>
</x-layouts.admin>
