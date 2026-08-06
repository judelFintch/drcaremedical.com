<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        $faqs = [
            [
                'question_fr' => 'Comment demander un devis pour du matériel médical ?',
                'question_en' => 'How do I request a quote for medical equipment?',
                'answer_fr' => 'Utilisez le formulaire « Demander un devis » du site ou contactez directement notre équipe. Nous étudions votre besoin avant de vous transmettre une proposition adaptée.',
                'answer_en' => 'Use the "Request a Quote" form on the site or contact our team directly. We review your needs before sending you a tailored proposal.',
            ],
            [
                'question_fr' => 'Quelles sont les étapes entre la commande et la livraison ?',
                'question_en' => 'What are the steps between order and delivery?',
                'answer_fr' => 'Après validation de la commande, l\'équipement est approvisionné puis acheminé de la Chine vers la RDC avant d\'être livré et installé sur site.',
                'answer_en' => 'Once the order is confirmed, the equipment is sourced and shipped from China to the DRC before being delivered and installed on site.',
            ],
            [
                'question_fr' => 'DRC CARE MEDICAL assure-t-elle la maintenance des équipements ?',
                'question_en' => 'Does DRC CARE MEDICAL provide equipment maintenance?',
                'answer_fr' => 'Oui, un service de maintenance préventive et corrective ainsi qu\'un accompagnement technique sont proposés après l\'installation.',
                'answer_en' => 'Yes, preventive and corrective maintenance along with technical support are available after installation.',
            ],
            [
                'question_fr' => 'Dans quelles villes DRC CARE MEDICAL est-elle présente ?',
                'question_en' => 'In which cities is DRC CARE MEDICAL present?',
                'answer_fr' => 'DRC CARE MEDICAL est présente à Lubumbashi, Kinshasa, Kasumbalesa et Kolwezi.',
                'answer_en' => 'DRC CARE MEDICAL is present in Lubumbashi, Kinshasa, Kasumbalesa and Kolwezi.',
            ],
        ];

        foreach ($faqs as $index => $data) {
            Faq::query()->updateOrCreate(
                ['question_fr' => $data['question_fr']],
                [...$data, 'order' => $index, 'is_published' => true]
            );
        }
    }
}
