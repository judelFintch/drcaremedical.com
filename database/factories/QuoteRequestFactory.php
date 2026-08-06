<?php

namespace Database\Factories;

use App\Enums\QuoteRequestStatus;
use App\Models\QuoteRequest;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<QuoteRequest>
 */
class QuoteRequestFactory extends Factory
{
    public function definition(): array
    {
        return [
            'product_id' => null,
            'name' => fake()->name(),
            'institution' => fake()->company(),
            'role' => fake()->jobTitle(),
            'city' => fake()->randomElement(['Lubumbashi', 'Kinshasa', 'Kasumbalesa', 'Kolwezi']),
            'email' => fake()->safeEmail(),
            'phone' => fake()->phoneNumber(),
            'quantity' => fake()->numberBetween(1, 10),
            'deadline' => fake()->randomElement(['Sous 1 mois', 'Sous 3 mois', 'À définir']),
            'message' => fake()->paragraph(),
            'status' => QuoteRequestStatus::New,
            'locale' => fake()->randomElement(['fr', 'en']),
        ];
    }
}
