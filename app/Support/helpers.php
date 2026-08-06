<?php

if (! function_exists('t')) {
    /**
     * Récupère un champ bilingue (ex: name_fr/name_en) selon la langue courante,
     * avec repli sur le français si la traduction anglaise est vide.
     */
    function t(mixed $model, string $field): ?string
    {
        if (! $model) {
            return null;
        }

        $locale = app()->getLocale();

        return $model->{"{$field}_{$locale}"} ?: $model->{"{$field}_fr"} ?? null;
    }
}

if (! function_exists('media_url')) {
    /**
     * URL publique d'un fichier stocké sur le disque `public`, ou null si vide.
     */
    function media_url(?string $path): ?string
    {
        return $path ? \Illuminate\Support\Facades\Storage::disk('public')->url($path) : null;
    }
}
