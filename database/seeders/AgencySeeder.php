<?php

namespace Database\Seeders;

use App\Models\Agency;
use Illuminate\Database\Seeder;

class AgencySeeder extends Seeder
{
    public function run(): void
    {
        $agencies = [
            [
                'city' => 'Lubumbashi',
                'address' => '196 Avenue Kapenda, Lubumbashi, 212700, République Démocratique du Congo',
                'phone' => '+243 99 533 924',
                'email' => 'info@drccaremed.com',
                'hours' => 'Lundi – Vendredi, 8h00 – 17h00',
                'order' => 0,
            ],
            [
                'city' => 'Kinshasa',
                'address' => 'Adresse de l\'agence à compléter',
                'phone' => null,
                'email' => null,
                'hours' => 'Adresse de l\'agence à compléter',
                'order' => 1,
            ],
            [
                'city' => 'Kasumbalesa',
                'address' => 'Adresse de l\'agence à compléter',
                'phone' => null,
                'email' => null,
                'hours' => 'Adresse de l\'agence à compléter',
                'order' => 2,
            ],
            [
                'city' => 'Kolwezi',
                'address' => 'Adresse de l\'agence à compléter',
                'phone' => null,
                'email' => null,
                'hours' => 'Adresse de l\'agence à compléter',
                'order' => 3,
            ],
        ];

        foreach ($agencies as $agency) {
            Agency::query()->updateOrCreate(['city' => $agency['city']], $agency);
        }
    }
}
