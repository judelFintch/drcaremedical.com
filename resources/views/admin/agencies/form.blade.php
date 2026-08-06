<x-layouts.admin :title="$agency->exists ? 'Modifier l\'agence' : 'Ajouter une agence'">
    <form
        method="POST"
        action="{{ $agency->exists ? route('admin.agencies.update', $agency) : route('admin.agencies.store') }}"
        class="max-w-3xl space-y-6"
    >
        @csrf
        @if ($agency->exists) @method('PUT') @endif

        <div class="rounded-lg border border-neutral-200 bg-white p-6">
            <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                <x-form.input name="city" label="Ville" :value="$agency->city" required />
                <x-form.input name="phone" label="Téléphone" :value="$agency->phone" />
                <x-form.input type="email" name="email" label="Email" :value="$agency->email" />
                <x-form.input name="hours" label="Horaires" :value="$agency->hours" />
            </div>
            <div class="mt-5">
                <x-form.textarea name="address" label="Adresse" :value="$agency->address" :rows="2" />
            </div>
            <div class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-2">
                <x-form.input type="number" step="any" name="lat" label="Latitude (facultative)" :value="$agency->lat" />
                <x-form.input type="number" step="any" name="lng" label="Longitude (facultative)" :value="$agency->lng" />
            </div>
        </div>

        <div class="rounded-lg border border-neutral-200 bg-white p-6">
            <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                <x-form.input type="number" name="order" label="Ordre d'affichage" :value="$agency->order ?? 0" min="0" />
                <label class="flex items-center gap-2 pt-7 text-sm text-neutral-700">
                    <input type="checkbox" name="is_published" value="1" @checked($agency->is_published ?? true) class="h-4 w-4 rounded border-neutral-300 text-brand-600 focus:ring-brand-500">
                    Publié sur le site
                </label>
            </div>
        </div>

        <div class="flex gap-3">
            <x-button type="submit">Enregistrer</x-button>
            <x-button as="a" :href="route('admin.agencies.index')" variant="secondary">Annuler</x-button>
        </div>
    </form>
</x-layouts.admin>
