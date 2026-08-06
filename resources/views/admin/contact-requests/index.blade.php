<x-layouts.admin title="Demandes de contact">
    <form method="GET" class="flex flex-wrap items-end gap-3">
        <div class="sm:w-56">
            <label for="status" class="block text-sm font-medium text-neutral-800">Statut</label>
            <select id="status" name="status" onchange="this.form.submit()" class="mt-1.5 block w-full rounded-md border border-neutral-300 bg-white px-3.5 py-2.5 text-sm focus:border-brand-600 focus:outline-none focus:ring-2 focus:ring-brand-100">
                <option value="">Tous les statuts</option>
                @foreach ($statuses as $status)
                    <option value="{{ $status->value }}" @selected(request('status') === $status->value)>{{ $status->label() }}</option>
                @endforeach
            </select>
        </div>
    </form>

    <div class="mt-6 overflow-x-auto rounded-lg border border-neutral-200 bg-white">
        <table class="min-w-full divide-y divide-neutral-200 text-sm">
            <thead class="bg-neutral-50">
                <tr>
                    <th class="px-4 py-3 text-left font-medium text-neutral-600">Nom</th>
                    <th class="px-4 py-3 text-left font-medium text-neutral-600">Type de besoin</th>
                    <th class="px-4 py-3 text-left font-medium text-neutral-600">Reçu le</th>
                    <th class="px-4 py-3 text-left font-medium text-neutral-600">Statut</th>
                    <th class="px-4 py-3"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-neutral-100">
                @forelse ($requests as $request)
                    <tr>
                        <td class="px-4 py-3 font-medium text-neutral-900">{{ $request->name }}</td>
                        <td class="px-4 py-3 text-neutral-600">{{ $request->need_type->label() }}</td>
                        <td class="px-4 py-3 text-neutral-600">{{ $request->created_at->format('d/m/Y H:i') }}</td>
                        <td class="px-4 py-3"><x-status-badge :status="$request->status" /></td>
                        <td class="px-4 py-3 text-right">
                            <a href="{{ route('admin.contact-requests.show', $request) }}" class="text-sm font-medium text-brand-700 hover:underline">Consulter</a>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5"><x-empty-state title="Aucune demande de contact" class="m-4 border-0" /></td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">{{ $requests->links() }}</div>
</x-layouts.admin>
