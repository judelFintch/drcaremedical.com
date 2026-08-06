<x-layouts.admin title="Chiffres clés">
    <div class="flex items-center justify-between">
        <p class="text-sm text-neutral-500">{{ $stats->total() }} chiffre(s) clé(s)</p>
        <x-button as="a" :href="route('admin.stats.create')">Ajouter un chiffre clé</x-button>
    </div>

    <div class="mt-6 overflow-x-auto rounded-lg border border-neutral-200 bg-white">
        <table class="min-w-full divide-y divide-neutral-200 text-sm">
            <thead class="bg-neutral-50">
                <tr>
                    <th class="px-4 py-3 text-left font-medium text-neutral-600">Libellé</th>
                    <th class="px-4 py-3 text-left font-medium text-neutral-600">Valeur</th>
                    <th class="px-4 py-3 text-left font-medium text-neutral-600">Statut</th>
                    <th class="px-4 py-3"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-neutral-100">
                @forelse ($stats as $stat)
                    <tr>
                        <td class="px-4 py-3 font-medium text-neutral-900">{{ $stat->label_fr }}</td>
                        <td class="px-4 py-3 text-neutral-600">{{ $stat->value }}</td>
                        <td class="px-4 py-3"><x-badge :color="$stat->is_published ? 'green' : 'gray'">{{ $stat->is_published ? 'Publié' : 'Masqué' }}</x-badge></td>
                        <td class="px-4 py-3 text-right">
                            <a href="{{ route('admin.stats.edit', $stat) }}" class="text-sm font-medium text-brand-700 hover:underline">Modifier</a>
                            <x-confirm-modal :action="route('admin.stats.destroy', $stat)" title="Supprimer ce chiffre clé ?" class="ml-3" />
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4"><x-empty-state title="Aucun chiffre clé" class="m-4 border-0" /></td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">{{ $stats->links() }}</div>
</x-layouts.admin>
