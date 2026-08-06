<?php

namespace App\Models;

use App\Enums\PublicationStatus;
use App\Models\Concerns\HasSlug;
use Database\Factories\ProductFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

#[Fillable([
    'category_id', 'name_fr', 'name_en', 'slug', 'summary_fr', 'summary_en',
    'description_fr', 'description_en', 'specifications', 'main_image',
    'reference', 'brand', 'status', 'is_featured', 'is_local_stock', 'order',
    'seo_title_fr', 'seo_title_en', 'seo_description_fr', 'seo_description_en',
])]
class Product extends Model
{
    /** @use HasFactory<ProductFactory> */
    use HasFactory, HasSlug;

    protected string $slugSource = 'name_fr';

    protected function casts(): array
    {
        return [
            'status' => PublicationStatus::class,
            'is_featured' => 'boolean',
            'is_local_stock' => 'boolean',
            'order' => 'integer',
            'specifications' => 'array',
        ];
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function images(): MorphMany
    {
        return $this->morphMany(MediaImage::class, 'imageable')->ordered();
    }

    public function quoteRequests(): HasMany
    {
        return $this->hasMany(QuoteRequest::class);
    }

    public function scopePublished($query)
    {
        return $query->where('status', PublicationStatus::Published);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeLocalStock($query)
    {
        return $query->where('is_local_stock', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order')->orderBy('name_fr');
    }
}
