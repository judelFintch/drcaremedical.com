<x-layouts.admin title="Agences">
    <div class="flex items-center justify-between">
        <p class="text-sm text-neutral-500">{{ $agencies->total() }} agence(s)</p>
        <x-button as="a" :href="route('admin.agencies.create')">Ajouter une agence</x-button>
    </div>

    <div class="mt-6 overflow-x-auto rounded-lg border border-neutral-200 bg-white">
        <table class="min-w-full divide-y divide-neutral-200 text-sm">
            <thead class="bg-neutral-50">
                <tr>
                    <th class="px-4 py-3 text-left font-medium text-neutral-600">Ville</th>
                    <th class="px-4 py-3 text-left font-medium text-neutral-600">Adresse</th>
                    <th class="px-4 py-3 text-left font-medium text-neutral-600">Statut</th>
                    <th class="px-4 py-3"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-neutral-100">
                @forelse ($agencies as $agency)
                    <tr>
                        <td class="px-4 py-3 font-medium text-neutral-900">{{ $agency->city }}</td>
                        <td class="px-4 py-3 text-neutral-600">{{ $agency->address }}</td>
                        <td class="px-4 py-3"><x-badge :color="$agency->is_published ? 'green' : 'gray'">{{ $agency->is_published ? 'Publié' : 'Masqué' }}</x-badge></td>
                        <td class="px-4 py-3 text-right">
                            <a href="{{ route('admin.agencies.edit', $agency) }}" class="text-sm font-medium text-brand-700 hover:underline">Modifier</a>
                            <x-confirm-modal :action="route('admin.agencies.destroy', $agency)" title="Supprimer cette agence ?" class="ml-3" />
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4"><x-empty-state title="Aucune agence" class="m-4 border-0" /></td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">{{ $agencies->links() }}</div>
</x-layouts.admin>
