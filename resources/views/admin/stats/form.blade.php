<x-layouts.admin :title="$stat->exists ? 'Modifier le chiffre clé' : 'Ajouter un chiffre clé'">
    <form
        method="POST"
        action="{{ $stat->exists ? route('admin.stats.update', $stat) : route('admin.stats.store') }}"
        class="max-w-2xl space-y-6"
    >
        @csrf
        @if ($stat->exists) @method('PUT') @endif

        <div class="rounded-lg border border-neutral-200 bg-white p-6">
            <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                <x-form.input name="label_fr" label="Libellé (français)" :value="$stat->label_fr" required />
                <x-form.input name="label_en" label="Libellé (English)" :value="$stat->label_en" required />
                <x-form.input name="value" label="Valeur affichée" :value="$stat->value" required help="Ex : 4, 100+, — si à renseigner" />
                <x-form.input name="icon" label="Icône (facultative)" :value="$stat->icon" />
            </div>
            <p class="mt-3 text-xs text-neutral-500">N'utilisez que des chiffres confirmés par DRC CARE MEDICAL. Laissez le statut « masqué » tant qu'une valeur réelle n'est pas confirmée.</p>
        </div>

        <div class="rounded-lg border border-neutral-200 bg-white p-6">
            <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                <x-form.input type="number" name="order" label="Ordre d'affichage" :value="$stat->order ?? 0" min="0" />
                <label class="flex items-center gap-2 pt-7 text-sm text-neutral-700">
                    <input type="checkbox" name="is_published" value="1" @checked($stat->is_published ?? false) class="h-4 w-4 rounded border-neutral-300 text-brand-600 focus:ring-brand-500">
                    Publié sur le site
                </label>
            </div>
        </div>

        <div class="flex gap-3">
            <x-button type="submit">Enregistrer</x-button>
            <x-button as="a" :href="route('admin.stats.index')" variant="secondary">Annuler</x-button>
        </div>
    </form>
</x-layouts.admin>
