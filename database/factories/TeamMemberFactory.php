<?php

namespace Database\Factories;

use App\Models\TeamMember;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<TeamMember>
 */
class TeamMemberFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'role_fr' => fake()->randomElement(['Responsable technique', 'Chargée logistique', 'Technicien biomédical', 'Responsable commercial']),
            'role_en' => fake()->randomElement(['Technical Manager', 'Logistics Officer', 'Biomedical Technician', 'Sales Manager']),
            'bio' => fake()->sentence(15),
            'city' => fake()->randomElement(['Lubumbashi', 'Kinshasa', 'Kasumbalesa', 'Kolwezi']),
            'photo' => null,
            'order' => fake()->numberBetween(0, 20),
            'is_published' => true,
        ];
    }
}
