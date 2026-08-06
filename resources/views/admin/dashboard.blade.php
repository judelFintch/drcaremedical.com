<x-layouts.admin title="Tableau de bord">
    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-5">
        @foreach ([
            ['label' => 'Produits publiés', 'value' => $publishedProductsCount, 'route' => 'admin.products.index'],
            ['label' => 'Catégories', 'value' => $categoriesCount, 'route' => 'admin.categories.index'],
            ['label' => 'Réalisations publiées', 'value' => $realisationsCount, 'route' => 'admin.realisations.index'],
            ['label' => 'Nouvelles demandes de contact', 'value' => $newContactRequestsCount, 'route' => 'admin.contact-requests.index'],
            ['label' => 'Nouvelles demandes de devis', 'value' => $newQuoteRequestsCount, 'route' => 'admin.quote-requests.index'],
        ] as $stat)
            <a href="{{ route($stat['route']) }}" class="block rounded-lg border border-neutral-200 bg-white p-5 hover:border-brand-300">
                <p class="text-2xl font-bold text-brand-700">{{ $stat['value'] }}</p>
                <p class="mt-1 text-sm text-neutral-600">{{ $stat['label'] }}</p>
            </a>
        @endforeach
    </div>

    <div class="mt-8 grid grid-cols-1 gap-6 lg:grid-cols-2">
        <div class="rounded-lg border border-neutral-200 bg-white">
            <div class="flex items-center justify-between border-b border-neutral-200 px-5 py-4">
                <h2 class="text-sm font-semibold text-neutral-900">Demandes de contact récentes</h2>
                <a href="{{ route('admin.contact-requests.index') }}" class="text-sm text-brand-700 hover:underline">Tout voir</a>
            </div>
            @if ($recentContactRequests->isEmpty())
                <x-empty-state title="Aucune demande de contact pour le moment" class="m-5 border-0 bg-transparent" />
            @else
                <ul class="divide-y divide-neutral-100">
                    @foreach ($recentContactRequests as $request)
                        <li class="flex items-center justify-between gap-3 px-5 py-3">
                            <div>
                                <a href="{{ route('admin.contact-requests.show', $request) }}" class="text-sm font-medium text-neutral-900 hover:text-brand-700">{{ $request->name }}</a>
                                <p class="text-xs text-neutral-500">{{ $request->created_at->diffForHumans() }}</p>
                            </div>
                            <x-status-badge :status="$request->status" />
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>

        <div class="rounded-lg border border-neutral-200 bg-white">
            <div class="flex items-center justify-between border-b border-neutral-200 px-5 py-4">
                <h2 class="text-sm font-semibold text-neutral-900">Demandes de devis récentes</h2>
                <a href="{{ route('admin.quote-requests.index') }}" class="text-sm text-brand-700 hover:underline">Tout voir</a>
            </div>
            @if ($recentQuoteRequests->isEmpty())
                <x-empty-state title="Aucune demande de devis pour le moment" class="m-5 border-0 bg-transparent" />
            @else
                <ul class="divide-y divide-neutral-100">
                    @foreach ($recentQuoteRequests as $request)
                        <li class="flex items-center justify-between gap-3 px-5 py-3">
                            <div>
                                <a href="{{ route('admin.quote-requests.show', $request) }}" class="text-sm font-medium text-neutral-900 hover:text-brand-700">{{ $request->name }}</a>
                                <p class="text-xs text-neutral-500">{{ $request->created_at->diffForHumans() }}</p>
                            </div>
                            <x-status-badge :status="$request->status" />
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
</x-layouts.admin>
