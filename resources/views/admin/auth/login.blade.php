<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion administration — DRC CARE MEDICAL</title>
    <meta name="robots" content="noindex, nofollow">
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex min-h-screen items-center justify-center bg-brand-950 px-4">
    <div class="w-full max-w-sm rounded-lg bg-white p-8 shadow-card">
        <div class="flex justify-center">
            <span class="flex h-12 w-12 items-center justify-center rounded-md bg-brand-900 text-sm font-bold text-white">DC</span>
        </div>
        <h1 class="mt-4 text-center text-lg font-bold text-neutral-950">Administration DRC CARE MEDICAL</h1>
        <p class="mt-1 text-center text-sm text-neutral-500">Connectez-vous pour accéder au panneau d'administration.</p>

        @if ($errors->any())
            <x-alert type="error" class="mt-6">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </x-alert>
        @endif

        <form method="POST" action="{{ route('admin.login.store') }}" class="mt-6 space-y-5">
            @csrf
            <x-form.input type="email" name="email" label="Adresse email" required autofocus />
            <x-form.input type="password" name="password" label="Mot de passe" required />
            <label class="flex items-center gap-2 text-sm text-neutral-600">
                <input type="checkbox" name="remember" value="1" class="h-4 w-4 rounded border-neutral-300 text-brand-600 focus:ring-brand-500">
                Se souvenir de moi
            </label>
            <x-button type="submit" class="w-full justify-center">Se connecter</x-button>
        </form>
    </div>
</body>
</html>
