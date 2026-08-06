<?php

namespace App\Models\Concerns;

use Illuminate\Support\Str;

trait HasSlug
{
    public static function bootHasSlug(): void
    {
        static::creating(function ($model) {
            if (blank($model->slug)) {
                $model->slug = $model->generateUniqueSlug();
            }
        });

        static::updating(function ($model) {
            if (blank($model->slug)) {
                $model->slug = $model->generateUniqueSlug();
            }
        });
    }

    protected function slugSourceAttribute(): string
    {
        return property_exists($this, 'slugSource') ? $this->slugSource : 'name_fr';
    }

    protected function generateUniqueSlug(): string
    {
        $base = Str::slug($this->{$this->slugSourceAttribute()} ?? '');
        $base = $base === '' ? Str::slug(class_basename($this)).'-'.Str::random(6) : $base;

        $slug = $base;
        $i = 1;

        while (
            static::query()
                ->where('slug', $slug)
                ->when($this->exists, fn ($query) => $query->whereKeyNot($this->getKey()))
                ->exists()
        ) {
            $slug = "{$base}-{$i}";
            $i++;
        }

        return $slug;
    }
}
