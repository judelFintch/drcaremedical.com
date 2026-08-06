<?php

namespace Database\Factories;

use App\Models\Testimonial;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Testimonial>
 */
class TestimonialFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'institution' => 'Établissement médical partenaire — démonstration',
            'role' => fake()->randomElement(['Directeur médical', 'Responsable achats', 'Infirmier chef']),
            'city' => fake()->randomElement(['Lubumbashi', 'Kinshasa', 'Kasumbalesa', 'Kolwezi']),
            'content_fr' => 'Témoignage de démonstration — contenu à remplacer par un témoignage validé par le client.',
            'content_en' => 'Demonstration testimonial — placeholder content to be replaced with a validated client testimonial.',
            'photo' => null,
            'rating' => fake()->numberBetween(4, 5),
            'is_published' => false,
            'order' => fake()->numberBetween(0, 20),
        ];
    }
}
