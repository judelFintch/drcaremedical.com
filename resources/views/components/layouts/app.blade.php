@props([
    'title' => null,
    'description' => null,
    'canonical' => null,
])

@php
    $pageTitle = $title ? "{$title} — DRC CARE MEDICAL" : 'DRC CARE MEDICAL — '.__('nav.tagline');
    $defaultDescriptionKey = app()->getLocale() === 'en' ? 'seo_default_description_en' : 'seo_default_description_fr';
    $pageDescription = $description ?: \App\Models\Setting::get($defaultDescriptionKey);
    $canonicalUrl = $canonical ?: url()->current();
@endphp

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $pageTitle }}</title>
    <meta name="description" content="{{ $pageDescription }}">
    <link rel="canonical" href="{{ $canonicalUrl }}">
    <link rel="icon" type="image/webp" href="{{ asset('images/brand/drc-care-medical-logo.webp') }}">

    <meta property="og:type" content="website">
    <meta property="og:site_name" content="DRC CARE MEDICAL">
    <meta property="og:title" content="{{ $pageTitle }}">
    <meta property="og:description" content="{{ $pageDescription }}">
    <meta property="og:url" content="{{ $canonicalUrl }}">
    <meta property="og:image" content="{{ asset('images/site/medical-equipment-hero.webp') }}">
    <meta property="og:image:alt" content="{{ __('home.hero_image_alt') }}">
    <meta property="og:locale" content="{{ app()->getLocale() === 'fr' ? 'fr_FR' : 'en_US' }}">
    <meta name="twitter:card" content="summary_large_image">

    <script type="application/ld+json">
        {!! json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'MedicalBusiness',
            'name' => 'DRC CARE MEDICAL',
            'url' => url('/'),
            'telephone' => config('drc.company.phone'),
            'email' => config('drc.company.email'),
            'address' => [
                '@type' => 'PostalAddress',
                'streetAddress' => '196 Avenue Kapenda',
                'addressLocality' => 'Lubumbashi',
                'postalCode' => '212700',
                'addressCountry' => 'CD',
            ],
            'sameAs' => [config('drc.company.facebook_url')],
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex min-h-screen flex-col bg-white text-neutral-900">
    <a href="#main-content" class="sr-only focus:not-sr-only focus:absolute focus:left-4 focus:top-4 focus:z-50 focus:rounded-md focus:bg-brand-900 focus:px-4 focus:py-2 focus:text-sm focus:text-white">
        {{ __('nav.skip_to_content') }}
    </a>

    @include('layouts.partials.header')

    @if (session('status'))
        <div class="mx-auto mt-4 w-full max-w-7xl px-4 sm:px-6 lg:px-8">
            <x-alert type="success">{{ session('status') }}</x-alert>
        </div>
    @endif

    <main id="main-content" class="flex-1">
        {{ $slot }}
    </main>

    @include('layouts.partials.footer')
</body>
</html>
