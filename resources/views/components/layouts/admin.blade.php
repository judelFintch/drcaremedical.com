@props(['title' => 'Administration'])

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }} — Administration DRC CARE MEDICAL</title>
    <meta name="robots" content="noindex, nofollow">
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-neutral-100 text-neutral-900" x-data="{ sidebarOpen: false }">
    <div class="flex min-h-screen">
        <aside
            :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'"
            class="fixed inset-y-0 left-0 z-40 w-64 shrink-0 -translate-x-full transform bg-brand-950 transition-transform lg:static lg:translate-x-0"
        >
            <div class="flex h-16 items-center gap-2 px-5">
                <span class="flex h-9 w-9 items-center justify-center rounded-md bg-white text-xs font-bold text-brand-900">DC</span>
                <span class="text-sm font-bold text-white">DRC CARE MEDICAL</span>
            </div>
            <nav class="mt-4 space-y-0.5 px-3 text-sm">
                @php
                    $links = [
                        ['route' => 'admin.dashboard', 'label' => 'Tableau de bord'],
                        ['route' => 'admin.categories.index', 'label' => 'Catégories'],
                        ['route' => 'admin.products.index', 'label' => 'Matériel médical'],
                        ['route' => 'admin.realisations.index', 'label' => 'Réalisations'],
                        ['route' => 'admin.team-members.index', 'label' => 'Équipe'],
                        ['route' => 'admin.partners.index', 'label' => 'Partenaires'],
                        ['route' => 'admin.testimonials.index', 'label' => 'Témoignages'],
                        ['route' => 'admin.agencies.index', 'label' => 'Agences'],
                        ['route' => 'admin.stats.index', 'label' => 'Chiffres clés'],
                        ['route' => 'admin.faqs.index', 'label' => 'FAQ'],
                        ['route' => 'admin.contact-requests.index', 'label' => 'Demandes de contact'],
                        ['route' => 'admin.quote-requests.index', 'label' => 'Demandes de devis'],
                        ['route' => 'admin.settings.edit', 'label' => 'Paramètres'],
                    ];
                @endphp
                @foreach ($links as $link)
                    <a
                        href="{{ route($link['route']) }}"
                        class="block rounded-md px-3 py-2 font-medium {{ request()->routeIs(str($link['route'])->before('.index').'*') || request()->routeIs($link['route']) ? 'bg-white/10 text-white' : 'text-brand-100 hover:bg-white/5 hover:text-white' }}"
                    >
                        {{ $link['label'] }}
                    </a>
                @endforeach
            </nav>
        </aside>

        <div x-cloak x-show="sidebarOpen" @click="sidebarOpen = false" class="fixed inset-0 z-30 bg-neutral-900/50 lg:hidden"></div>

        <div class="flex-1">
            <header class="flex h-16 items-center justify-between border-b border-neutral-200 bg-white px-4 sm:px-6">
                <div class="flex items-center gap-3">
                    <button type="button" @click="sidebarOpen = true" class="rounded-md p-2 text-neutral-600 hover:bg-neutral-100 lg:hidden" aria-label="Ouvrir le menu">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                    <h1 class="text-base font-semibold text-neutral-900">{{ $title }}</h1>
                </div>
                <div class="flex items-center gap-4">
                    <a href="{{ route('home') }}" target="_blank" class="text-sm text-neutral-500 hover:text-brand-700">Voir le site</a>
                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                        <button type="submit" class="text-sm font-medium text-neutral-600 hover:text-red-600">Déconnexion</button>
                    </form>
                </div>
            </header>

            <main class="p-4 sm:p-6 lg:p-8">
                @if (session('status'))
                    <x-alert type="success" class="mb-6">{{ session('status') }}</x-alert>
                @endif
                @if ($errors->any())
                    <x-alert type="error" class="mb-6">
                        <ul class="list-inside list-disc space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </x-alert>
                @endif

                {{ $slot }}
            </main>
        </div>
    </div>
</body>
</html>
