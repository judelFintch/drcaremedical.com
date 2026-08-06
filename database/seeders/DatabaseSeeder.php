<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            SettingSeeder::class,
            AgencySeeder::class,
            CategorySeeder::class,
            ProductSeeder::class,
            RealisationSeeder::class,
            TeamMemberSeeder::class,
            PartnerSeeder::class,
            TestimonialSeeder::class,
            StatSeeder::class,
            FaqSeeder::class,
            DevAdminSeeder::class,
        ]);
    }
}
