<x-layouts.admin title="Matériel médical">
    <div class="flex flex-wrap items-center justify-between gap-4">
        <form method="GET" class="flex gap-2">
            <input type="search" name="q" value="{{ request('q') }}" placeholder="Rechercher un produit…" class="rounded-md border border-neutral-300 px-3.5 py-2 text-sm focus:border-brand-600 focus:outline-none focus:ring-2 focus:ring-brand-100">
            <x-button type="submit" variant="secondary" size="sm">Rechercher</x-button>
        </form>
        <x-button as="a" :href="route('admin.products.create')">Ajouter un produit</x-button>
    </div>

    <div class="mt-6 overflow-x-auto rounded-lg border border-neutral-200 bg-white">
        <table class="min-w-full divide-y divide-neutral-200 text-sm">
            <thead class="bg-neutral-50">
                <tr>
                    <th class="px-4 py-3 text-left font-medium text-neutral-600">Produit</th>
                    <th class="px-4 py-3 text-left font-medium text-neutral-600">Catégorie</th>
                    <th class="px-4 py-3 text-left font-medium text-neutral-600">Mis en avant</th>
                    <th class="px-4 py-3 text-left font-medium text-neutral-600">Statut</th>
                    <th class="px-4 py-3"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-neutral-100">
                @forelse ($products as $product)
                    <tr>
                        <td class="px-4 py-3 font-medium text-neutral-900">{{ $product->name_fr }}</td>
                        <td class="px-4 py-3 text-neutral-600">{{ $product->category->name_fr }}</td>
                        <td class="px-4 py-3">{{ $product->is_featured ? 'Oui' : '—' }}</td>
                        <td class="px-4 py-3"><x-status-badge :status="$product->status" /></td>
                        <td class="px-4 py-3 text-right">
                            <a href="{{ route('admin.products.edit', $product) }}" class="text-sm font-medium text-brand-700 hover:underline">Modifier</a>
                            <x-confirm-modal :action="route('admin.products.destroy', $product)" title="Supprimer ce produit ?" class="ml-3" />
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5"><x-empty-state title="Aucun produit" class="m-4 border-0" /></td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">{{ $products->links() }}</div>
</x-layouts.admin>
