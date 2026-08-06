<?php

namespace Database\Factories;

use App\Models\Agency;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Agency>
 */
class AgencyFactory extends Factory
{
    public function definition(): array
    {
        return [
            'city' => fake()->unique()->randomElement(['Lubumbashi', 'Kinshasa', 'Kasumbalesa', 'Kolwezi']),
            'address' => 'Adresse de l\'agence à compléter',
            'phone' => null,
            'email' => null,
            'hours' => 'Lundi – Vendredi, 8h – 17h',
            'is_published' => true,
            'order' => fake()->numberBetween(0, 10),
        ];
    }
}
