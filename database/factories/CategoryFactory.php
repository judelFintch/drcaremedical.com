<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Category>
 */
class CategoryFactory extends Factory
{
    public function definition(): array
    {
        $name = ucfirst(fake()->unique()->words(2, true));

        return [
            'name_fr' => $name,
            'name_en' => $name,
            'description_fr' => fake()->sentence(12),
            'description_en' => fake()->sentence(12),
            'image' => null,
            'order' => fake()->numberBetween(0, 20),
            'is_active' => true,
        ];
    }
}
