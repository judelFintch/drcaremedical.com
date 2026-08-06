<x-layouts.admin title="Catégories">
    <div class="flex items-center justify-between">
        <p class="text-sm text-neutral-500">{{ $categories->total() }} catégorie(s)</p>
        <x-button as="a" :href="route('admin.categories.create')">Ajouter une catégorie</x-button>
    </div>

    <div class="mt-6 overflow-x-auto rounded-lg border border-neutral-200 bg-white">
        <table class="min-w-full divide-y divide-neutral-200 text-sm">
            <thead class="bg-neutral-50">
                <tr>
                    <th class="px-4 py-3 text-left font-medium text-neutral-600">Nom</th>
                    <th class="px-4 py-3 text-left font-medium text-neutral-600">Produits</th>
                    <th class="px-4 py-3 text-left font-medium text-neutral-600">Statut</th>
                    <th class="px-4 py-3"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-neutral-100">
                @forelse ($categories as $category)
                    <tr>
                        <td class="px-4 py-3 font-medium text-neutral-900">{{ $category->name_fr }}</td>
                        <td class="px-4 py-3 text-neutral-600">{{ $category->products_count }}</td>
                        <td class="px-4 py-3">
                            <x-badge :color="$category->is_active ? 'green' : 'gray'">{{ $category->is_active ? 'Actif' : 'Inactif' }}</x-badge>
                        </td>
                        <td class="px-4 py-3 text-right">
                            <a href="{{ route('admin.categories.edit', $category) }}" class="text-sm font-medium text-brand-700 hover:underline">Modifier</a>
                            <x-confirm-modal :action="route('admin.categories.destroy', $category)" title="Supprimer cette catégorie ?" class="ml-3" />
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4"><x-empty-state title="Aucune catégorie" class="m-4 border-0" /></td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">{{ $categories->links() }}</div>
</x-layouts.admin>
