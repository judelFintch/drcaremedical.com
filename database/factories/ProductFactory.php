<?php

namespace Database\Factories;

use App\Enums\PublicationStatus;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    public function definition(): array
    {
        $name = ucfirst(fake()->unique()->words(3, true));

        return [
            'category_id' => Category::factory(),
            'name_fr' => $name,
            'name_en' => $name,
            'summary_fr' => fake()->sentence(10),
            'summary_en' => fake()->sentence(10),
            'description_fr' => fake()->paragraphs(3, true),
            'description_en' => fake()->paragraphs(3, true),
            'specifications' => [
                'Alimentation' => '220V / 50Hz',
                'Poids' => fake()->numberBetween(5, 300).' kg',
            ],
            'main_image' => null,
            'reference' => strtoupper(fake()->bothify('REF-####??')),
            'brand' => null,
            'status' => PublicationStatus::Published,
            'is_featured' => false,
            'order' => fake()->numberBetween(0, 20),
        ];
    }

    public function draft(): static
    {
        return $this->state(fn () => ['status' => PublicationStatus::Draft]);
    }

    public function featured(): static
    {
        return $this->state(fn () => ['is_featured' => true]);
    }
}
