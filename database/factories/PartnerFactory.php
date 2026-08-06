<?php

namespace Database\Factories;

use App\Models\Partner;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Partner>
 */
class PartnerFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->company().' (démonstration)',
            'type' => fake()->randomElement(['Établissement médical partenaire', 'Fournisseur logistique', 'Institution de santé']),
            'logo' => null,
            'description_fr' => 'Établissement médical partenaire — démonstration.',
            'description_en' => 'Partner medical institution — demonstration content.',
            'website' => null,
            'order' => fake()->numberBetween(0, 20),
            'is_published' => true,
        ];
    }
}
