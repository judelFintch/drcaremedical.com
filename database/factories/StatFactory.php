<?php

namespace Database\Factories;

use App\Models\Stat;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Stat>
 */
class StatFactory extends Factory
{
    public function definition(): array
    {
        return [
            'label_fr' => 'Statistique à renseigner',
            'label_en' => 'Statistic to be provided',
            'value' => '—',
            'icon' => null,
            'order' => fake()->numberBetween(0, 10),
            'is_published' => false,
        ];
    }
}
