<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        // Créés désactivés (is_published = false) : à activer en admin uniquement après validation par un client réel.
        Testimonial::factory()->count(3)->sequence(
            ['order' => 0],
            ['order' => 1],
            ['order' => 2],
        )->create();
    }
}
