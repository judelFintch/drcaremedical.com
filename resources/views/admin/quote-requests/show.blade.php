<x-layouts.admin title="Demande de devis">
    <a href="{{ route('admin.quote-requests.index') }}" class="text-sm text-brand-700 hover:underline">&larr; Retour aux demandes</a>

    <div class="mt-4 grid grid-cols-1 gap-6 lg:grid-cols-3">
        <div class="lg:col-span-2 space-y-6">
            <div class="rounded-lg border border-neutral-200 bg-white p-6">
                <div class="flex items-start justify-between gap-4">
                    <div>
                        <h1 class="text-lg font-bold text-neutral-950">{{ $quoteRequest->name }}</h1>
                        <p class="text-sm text-neutral-500">{{ $quoteRequest->created_at->format('d/m/Y à H:i') }} · Langue : {{ strtoupper($quoteRequest->locale) }}</p>
                    </div>
                    <x-status-badge :status="$quoteRequest->status" />
                </div>

                @if ($quoteRequest->product)
                    <div class="mt-4 rounded-md bg-brand-50 px-4 py-3 text-sm text-brand-800">
                        Produit concerné : <a href="{{ route('catalog.show', $quoteRequest->product) }}" target="_blank" class="font-medium hover:underline">{{ $quoteRequest->product->name_fr }}</a>
                    </div>
                @endif

                <dl class="mt-6 grid grid-cols-1 gap-4 text-sm sm:grid-cols-2">
                    <div><dt class="text-neutral-500">Établissement</dt><dd class="font-medium text-neutral-900">{{ $quoteRequest->institution ?: '—' }}</dd></div>
                    <div><dt class="text-neutral-500">Fonction</dt><dd class="font-medium text-neutral-900">{{ $quoteRequest->role ?: '—' }}</dd></div>
                    <div><dt class="text-neutral-500">Ville</dt><dd class="font-medium text-neutral-900">{{ $quoteRequest->city ?: '—' }}</dd></div>
                    <div><dt class="text-neutral-500">Email</dt><dd class="font-medium text-neutral-900"><a href="mailto:{{ $quoteRequest->email }}" class="text-brand-700 hover:underline">{{ $quoteRequest->email }}</a></dd></div>
                    <div><dt class="text-neutral-500">Téléphone</dt><dd class="font-medium text-neutral-900">{{ $quoteRequest->phone ?: '—' }}</dd></div>
                    <div><dt class="text-neutral-500">Quantité</dt><dd class="font-medium text-neutral-900">{{ $quoteRequest->quantity ?: '—' }}</dd></div>
                    <div><dt class="text-neutral-500">Délai souhaité</dt><dd class="font-medium text-neutral-900">{{ $quoteRequest->deadline ?: '—' }}</dd></div>
                </dl>

                <div class="mt-6">
                    <p class="text-sm font-medium text-neutral-800">Message</p>
                    <p class="mt-2 whitespace-pre-line rounded-md bg-neutral-50 p-4 text-sm text-neutral-700">{{ $quoteRequest->message }}</p>
                </div>

                @if ($quoteRequest->attachment_path)
                    <div class="mt-6">
                        <a href="{{ route('admin.quote-requests.attachment', $quoteRequest) }}" class="inline-flex items-center gap-2 text-sm font-medium text-brand-700 hover:underline">
                            Télécharger la pièce jointe
                        </a>
                    </div>
                @endif
            </div>
        </div>

        <div class="space-y-6">
            <form method="POST" action="{{ route('admin.quote-requests.update', $quoteRequest) }}" class="rounded-lg border border-neutral-200 bg-white p-6">
                @csrf
                @method('PUT')
                <x-form.select name="status" label="Statut" :value="$quoteRequest->status->value" :options="collect($statuses)->mapWithKeys(fn ($s) => [$s->value => $s->label()])" required />
                <div class="mt-4">
                    <x-form.textarea name="internal_notes" label="Notes internes" :value="$quoteRequest->internal_notes" :rows="4" help="Visibles uniquement par l'équipe DRC CARE MEDICAL." />
                </div>
                <x-button type="submit" class="mt-4 w-full justify-center">Mettre à jour</x-button>
            </form>

            <div class="rounded-lg border border-neutral-200 bg-white p-6">
                <p class="text-sm font-medium text-neutral-800">Zone de suppression</p>
                <p class="mt-1 text-xs text-neutral-500">Cette action est définitive.</p>
                <x-confirm-modal :action="route('admin.quote-requests.destroy', $quoteRequest)" title="Supprimer cette demande ?" class="mt-3" />
            </div>
        </div>
    </div>
</x-layouts.admin>
