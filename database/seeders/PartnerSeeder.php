<?php

namespace Database\Seeders;

use App\Models\Partner;
use Illuminate\Database\Seeder;

class PartnerSeeder extends Seeder
{
    public function run(): void
    {
        Partner::factory()->count(4)->sequence(
            ['order' => 0],
            ['order' => 1],
            ['order' => 2],
            ['order' => 3],
        )->create();
    }
}
