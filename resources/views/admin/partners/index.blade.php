<x-layouts.admin title="Partenaires">
    <div class="flex items-center justify-between">
        <p class="text-sm text-neutral-500">{{ $partners->total() }} partenaire(s)</p>
        <x-button as="a" :href="route('admin.partners.create')">Ajouter un partenaire</x-button>
    </div>

    <div class="mt-6 overflow-x-auto rounded-lg border border-neutral-200 bg-white">
        <table class="min-w-full divide-y divide-neutral-200 text-sm">
            <thead class="bg-neutral-50">
                <tr>
                    <th class="px-4 py-3 text-left font-medium text-neutral-600">Nom</th>
                    <th class="px-4 py-3 text-left font-medium text-neutral-600">Type</th>
                    <th class="px-4 py-3 text-left font-medium text-neutral-600">Statut</th>
                    <th class="px-4 py-3"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-neutral-100">
                @forelse ($partners as $partner)
                    <tr>
                        <td class="px-4 py-3 font-medium text-neutral-900">{{ $partner->name }}</td>
                        <td class="px-4 py-3 text-neutral-600">{{ $partner->type }}</td>
                        <td class="px-4 py-3"><x-badge :color="$partner->is_published ? 'green' : 'gray'">{{ $partner->is_published ? 'Publié' : 'Masqué' }}</x-badge></td>
                        <td class="px-4 py-3 text-right">
                            <a href="{{ route('admin.partners.edit', $partner) }}" class="text-sm font-medium text-brand-700 hover:underline">Modifier</a>
                            <x-confirm-modal :action="route('admin.partners.destroy', $partner)" title="Supprimer ce partenaire ?" class="ml-3" />
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4"><x-empty-state title="Aucun partenaire" class="m-4 border-0" /></td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">{{ $partners->links() }}</div>
</x-layouts.admin>
