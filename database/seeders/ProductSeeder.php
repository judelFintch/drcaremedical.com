<?php

namespace Database\Seeders;

use App\Enums\PublicationStatus;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    private const string DEMO_NOTE_FR = "Fiche produit de démonstration destinée à illustrer le fonctionnement du catalogue. Les caractéristiques techniques réelles seront fournies par DRC CARE MEDICAL.";

    private const string DEMO_NOTE_EN = 'Demonstration product sheet used to illustrate how the catalog works. Real technical specifications will be provided by DRC CARE MEDICAL.';

    public function run(): void
    {
        $products = [
            [
                'category' => 'Imagerie médicale',
                'name_fr' => 'Échographe portable — produit de démonstration',
                'name_en' => 'Portable ultrasound scanner — demonstration product',
                'is_featured' => true,
            ],
            [
                'category' => 'Imagerie médicale',
                'name_fr' => 'Appareil de radiographie mobile — produit de démonstration',
                'name_en' => 'Mobile X-ray unit — demonstration product',
                'is_featured' => false,
            ],
            [
                'category' => 'Bloc opératoire',
                'name_fr' => 'Table d\'opération électrique — produit de démonstration',
                'name_en' => 'Electric operating table — demonstration product',
                'is_featured' => true,
            ],
            [
                'category' => 'Bloc opératoire',
                'name_fr' => 'Scialytique de bloc opératoire — produit de démonstration',
                'name_en' => 'Surgical operating light — demonstration product',
                'is_featured' => false,
            ],
            [
                'category' => 'Réanimation et soins intensifs',
                'name_fr' => 'Moniteur multiparamétrique — produit de démonstration',
                'name_en' => 'Multiparameter patient monitor — demonstration product',
                'is_featured' => true,
            ],
            [
                'category' => 'Réanimation et soins intensifs',
                'name_fr' => 'Respirateur de réanimation — produit de démonstration',
                'name_en' => 'ICU ventilator — demonstration product',
                'is_featured' => false,
            ],
            [
                'category' => 'Stérilisation',
                'name_fr' => 'Autoclave hospitalier — produit de démonstration',
                'name_en' => 'Hospital autoclave — demonstration product',
                'is_featured' => false,
            ],
            [
                'category' => 'Diagnostic et laboratoire',
                'name_fr' => 'Analyseur de biochimie — produit de démonstration',
                'name_en' => 'Biochemistry analyzer — demonstration product',
                'is_featured' => false,
            ],
            [
                'category' => 'Mobilier hospitalier',
                'name_fr' => 'Lit d\'hôpital électrique — produit de démonstration',
                'name_en' => 'Electric hospital bed — demonstration product',
                'is_featured' => true,
            ],
            [
                'category' => 'Mobilier hospitalier',
                'name_fr' => 'Fauteuil de consultation — produit de démonstration',
                'name_en' => 'Examination chair — demonstration product',
                'is_featured' => false,
            ],
        ];

        foreach ($products as $index => $data) {
            $category = Category::query()->where('name_fr', $data['category'])->first();

            if (! $category) {
                continue;
            }

            Product::query()->updateOrCreate(
                ['name_fr' => $data['name_fr']],
                [
                    'category_id' => $category->id,
                    'name_en' => $data['name_en'],
                    'summary_fr' => 'Produit de démonstration — description à remplacer par les informations réelles du fabricant.',
                    'summary_en' => 'Demonstration product — description to be replaced with the manufacturer\'s real information.',
                    'description_fr' => self::DEMO_NOTE_FR,
                    'description_en' => self::DEMO_NOTE_EN,
                    'specifications' => [
                        'Caractéristiques techniques' => 'À confirmer par le fabricant',
                    ],
                    'main_image' => null,
                    'reference' => null,
                    'brand' => null,
                    'status' => PublicationStatus::Published,
                    'is_featured' => $data['is_featured'],
                    'order' => $index,
                ]
            );
        }
    }
}
