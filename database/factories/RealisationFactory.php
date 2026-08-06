<?php

namespace Database\Factories;

use App\Enums\PublicationStatus;
use App\Models\Realisation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Realisation>
 */
class RealisationFactory extends Factory
{
    public function definition(): array
    {
        $title = ucfirst(fake()->unique()->words(4, true));

        return [
            'title_fr' => $title,
            'title_en' => $title,
            'client_name' => 'Établissement médical partenaire — démonstration',
            'city' => fake()->randomElement(['Lubumbashi', 'Kinshasa', 'Kasumbalesa', 'Kolwezi']),
            'realised_at' => fake()->dateTimeBetween('-2 years', 'now'),
            'summary_fr' => fake()->sentence(12),
            'summary_en' => fake()->sentence(12),
            'description_fr' => fake()->paragraphs(3, true),
            'description_en' => fake()->paragraphs(3, true),
            'equipment_fr' => 'Matériel de démonstration',
            'equipment_en' => 'Demonstration equipment',
            'main_image' => null,
            'status' => PublicationStatus::Published,
            'is_featured' => false,
        ];
    }

    public function draft(): static
    {
        return $this->state(fn () => ['status' => PublicationStatus::Draft]);
    }
}
