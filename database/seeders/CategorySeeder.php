<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name_fr' => 'Imagerie médicale',
                'name_en' => 'Medical imaging',
                'description_fr' => 'Équipements de radiologie, échographie et imagerie diagnostique.',
                'description_en' => 'Radiology, ultrasound and diagnostic imaging equipment.',
                'order' => 0,
            ],
            [
                'name_fr' => 'Bloc opératoire',
                'name_en' => 'Operating theatre',
                'description_fr' => 'Tables d\'opération, éclairage chirurgical et équipements de bloc.',
                'description_en' => 'Operating tables, surgical lighting and theatre equipment.',
                'order' => 1,
            ],
            [
                'name_fr' => 'Réanimation et soins intensifs',
                'name_en' => 'Intensive & critical care',
                'description_fr' => 'Moniteurs, respirateurs et équipements de soins intensifs.',
                'description_en' => 'Monitors, ventilators and critical care equipment.',
                'order' => 2,
            ],
            [
                'name_fr' => 'Stérilisation',
                'name_en' => 'Sterilization',
                'description_fr' => 'Autoclaves et équipements de stérilisation hospitalière.',
                'description_en' => 'Autoclaves and hospital sterilization equipment.',
                'order' => 3,
            ],
            [
                'name_fr' => 'Diagnostic et laboratoire',
                'name_en' => 'Diagnostics & laboratory',
                'description_fr' => 'Analyseurs et équipements de laboratoire médical.',
                'description_en' => 'Analyzers and medical laboratory equipment.',
                'order' => 4,
            ],
            [
                'name_fr' => 'Mobilier hospitalier',
                'name_en' => 'Hospital furniture',
                'description_fr' => 'Lits médicalisés, mobilier de soins et équipements de confort.',
                'description_en' => 'Hospital beds, care furniture and patient comfort equipment.',
                'order' => 5,
            ],
        ];

        foreach ($categories as $category) {
            Category::query()->updateOrCreate(['name_fr' => $category['name_fr']], $category);
        }
    }
}
