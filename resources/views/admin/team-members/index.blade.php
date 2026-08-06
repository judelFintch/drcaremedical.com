<x-layouts.admin title="Équipe">
    <div class="flex items-center justify-between">
        <p class="text-sm text-neutral-500">{{ $members->total() }} membre(s)</p>
        <x-button as="a" :href="route('admin.team-members.create')">Ajouter un membre</x-button>
    </div>

    <div class="mt-6 overflow-x-auto rounded-lg border border-neutral-200 bg-white">
        <table class="min-w-full divide-y divide-neutral-200 text-sm">
            <thead class="bg-neutral-50">
                <tr>
                    <th class="px-4 py-3 text-left font-medium text-neutral-600">Nom</th>
                    <th class="px-4 py-3 text-left font-medium text-neutral-600">Fonction</th>
                    <th class="px-4 py-3 text-left font-medium text-neutral-600">Ville</th>
                    <th class="px-4 py-3 text-left font-medium text-neutral-600">Statut</th>
                    <th class="px-4 py-3"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-neutral-100">
                @forelse ($members as $member)
                    <tr>
                        <td class="px-4 py-3 font-medium text-neutral-900">{{ $member->name }}</td>
                        <td class="px-4 py-3 text-neutral-600">{{ $member->role_fr }}</td>
                        <td class="px-4 py-3 text-neutral-600">{{ $member->city }}</td>
                        <td class="px-4 py-3"><x-badge :color="$member->is_published ? 'green' : 'gray'">{{ $member->is_published ? 'Publié' : 'Masqué' }}</x-badge></td>
                        <td class="px-4 py-3 text-right">
                            <a href="{{ route('admin.team-members.edit', $member) }}" class="text-sm font-medium text-brand-700 hover:underline">Modifier</a>
                            <x-confirm-modal :action="route('admin.team-members.destroy', $member)" title="Supprimer ce membre ?" class="ml-3" />
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5"><x-empty-state title="Aucun membre d'équipe" class="m-4 border-0" /></td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">{{ $members->links() }}</div>
</x-layouts.admin>
