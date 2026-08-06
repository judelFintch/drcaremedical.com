<?php

namespace App\Models;

use App\Enums\PublicationStatus;
use App\Models\Concerns\HasSlug;
use Database\Factories\RealisationFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

#[Fillable([
    'title_fr', 'title_en', 'slug', 'client_name', 'city', 'realised_at',
    'summary_fr', 'summary_en', 'description_fr', 'description_en',
    'equipment_fr', 'equipment_en', 'main_image', 'status', 'is_featured',
    'seo_title_fr', 'seo_title_en', 'seo_description_fr', 'seo_description_en',
])]
class Realisation extends Model
{
    /** @use HasFactory<RealisationFactory> */
    use HasFactory, HasSlug;

    protected string $slugSource = 'title_fr';

    protected function casts(): array
    {
        return [
            'status' => PublicationStatus::class,
            'is_featured' => 'boolean',
            'realised_at' => 'date',
        ];
    }

    public function images(): MorphMany
    {
        return $this->morphMany(MediaImage::class, 'imageable')->ordered();
    }

    public function scopePublished($query)
    {
        return $query->where('status', PublicationStatus::Published);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeRecent($query)
    {
        return $query->orderByDesc('realised_at');
    }
}
