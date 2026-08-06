<?php

namespace Database\Seeders;

use App\Enums\PublicationStatus;
use App\Models\Realisation;
use Illuminate\Database\Seeder;

class RealisationSeeder extends Seeder
{
    public function run(): void
    {
        $realisations = [
            [
                'title_fr' => 'Livraison d\'équipements de bloc opératoire — exemple de démonstration',
                'title_en' => 'Operating theatre equipment delivery — demonstration example',
                'city' => 'Lubumbashi',
            ],
            [
                'title_fr' => 'Installation d\'équipements d\'imagerie médicale — exemple de démonstration',
                'title_en' => 'Medical imaging equipment installation — demonstration example',
                'city' => 'Kinshasa',
            ],
            [
                'title_fr' => 'Acheminement de matériel de réanimation — exemple de démonstration',
                'title_en' => 'Critical care equipment shipment — demonstration example',
                'city' => 'Kolwezi',
            ],
        ];

        foreach ($realisations as $index => $data) {
            Realisation::query()->updateOrCreate(
                ['title_fr' => $data['title_fr']],
                [
                    'title_en' => $data['title_en'],
                    'client_name' => 'Établissement médical partenaire — démonstration',
                    'city' => $data['city'],
                    'realised_at' => now()->subMonths($index + 1),
                    'summary_fr' => 'Exemple de réalisation de démonstration illustrant le déroulé d\'une prise en charge.',
                    'summary_en' => 'Demonstration example illustrating how a project is handled.',
                    'description_fr' => 'Contenu de démonstration. Le besoin, la solution proposée et le déroulé réel de l\'intervention seront décrits ici une fois les réalisations officielles communiquées par DRC CARE MEDICAL.',
                    'description_en' => 'Demonstration content. The real need, proposed solution and intervention details will be described here once official case studies are provided by DRC CARE MEDICAL.',
                    'equipment_fr' => 'Matériel de démonstration',
                    'equipment_en' => 'Demonstration equipment',
                    'main_image' => null,
                    'status' => PublicationStatus::Published,
                    'is_featured' => $index === 0,
                ]
            );
        }
    }
}
