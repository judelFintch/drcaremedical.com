<?php

namespace Database\Factories;

use App\Enums\ContactNeedType;
use App\Enums\ContactRequestStatus;
use App\Models\ContactRequest;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ContactRequest>
 */
class ContactRequestFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'institution' => fake()->company(),
            'city' => fake()->randomElement(['Lubumbashi', 'Kinshasa', 'Kasumbalesa', 'Kolwezi']),
            'email' => fake()->safeEmail(),
            'phone' => fake()->phoneNumber(),
            'need_type' => fake()->randomElement(ContactNeedType::cases()),
            'message' => fake()->paragraph(),
            'status' => ContactRequestStatus::New,
            'locale' => fake()->randomElement(['fr', 'en']),
        ];
    }
}
