<?php

namespace Database\Factories;

use App\Models\Faq;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Faq>
 */
class FaqFactory extends Factory
{
    public function definition(): array
    {
        return [
            'question_fr' => fake()->sentence(8).' ?',
            'question_en' => fake()->sentence(8).' ?',
            'answer_fr' => fake()->paragraph(),
            'answer_en' => fake()->paragraph(),
            'order' => fake()->numberBetween(0, 10),
            'is_published' => true,
        ];
    }
}
