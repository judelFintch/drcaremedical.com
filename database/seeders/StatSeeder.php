<?php

namespace Database\Seeders;

use App\Models\Stat;
use Illuminate\Database\Seeder;

class StatSeeder extends Seeder
{
    public function run(): void
    {
        // Créés désactivés (is_published = false) : chiffres réels à renseigner puis publier depuis l'admin.
        $stats = [
            ['label_fr' => 'Villes desservies en RDC', 'label_en' => 'Cities served in the DRC', 'value' => '4'],
            ['label_fr' => 'Statistique à renseigner', 'label_en' => 'Statistic to be provided', 'value' => '—'],
            ['label_fr' => 'Statistique à renseigner', 'label_en' => 'Statistic to be provided', 'value' => '—'],
        ];

        foreach ($stats as $index => $data) {
            Stat::factory()->create([
                ...$data,
                'order' => $index,
                'is_published' => false,
            ]);
        }
    }
}
