<x-layouts.admin title="Réalisations">
    <div class="flex items-center justify-between">
        <p class="text-sm text-neutral-500">{{ $realisations->total() }} réalisation(s)</p>
        <x-button as="a" :href="route('admin.realisations.create')">Ajouter une réalisation</x-button>
    </div>

    <div class="mt-6 overflow-x-auto rounded-lg border border-neutral-200 bg-white">
        <table class="min-w-full divide-y divide-neutral-200 text-sm">
            <thead class="bg-neutral-50">
                <tr>
                    <th class="px-4 py-3 text-left font-medium text-neutral-600">Titre</th>
                    <th class="px-4 py-3 text-left font-medium text-neutral-600">Ville</th>
                    <th class="px-4 py-3 text-left font-medium text-neutral-600">Date</th>
                    <th class="px-4 py-3 text-left font-medium text-neutral-600">Statut</th>
                    <th class="px-4 py-3"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-neutral-100">
                @forelse ($realisations as $realisation)
                    <tr>
                        <td class="px-4 py-3 font-medium text-neutral-900">{{ $realisation->title_fr }}</td>
                        <td class="px-4 py-3 text-neutral-600">{{ $realisation->city }}</td>
                        <td class="px-4 py-3 text-neutral-600">{{ $realisation->realised_at?->format('d/m/Y') }}</td>
                        <td class="px-4 py-3"><x-status-badge :status="$realisation->status" /></td>
                        <td class="px-4 py-3 text-right">
                            <a href="{{ route('admin.realisations.edit', $realisation) }}" class="text-sm font-medium text-brand-700 hover:underline">Modifier</a>
                            <x-confirm-modal :action="route('admin.realisations.destroy', $realisation)" title="Supprimer cette réalisation ?" class="ml-3" />
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5"><x-empty-state title="Aucune réalisation" class="m-4 border-0" /></td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">{{ $realisations->links() }}</div>
</x-layouts.admin>
