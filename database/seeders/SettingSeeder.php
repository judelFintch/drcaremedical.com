<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            'site_name' => 'DRC CARE MEDICAL',
            'site_tagline_fr' => 'Matériel médical et hospitalier — de la Chine à la RDC',
            'site_tagline_en' => 'Medical and hospital equipment — from China to the DRC',
            'company_phone' => '+243 995 339 249',
            'company_phone_secondary' => '+243 850 323 211',
            'company_email' => 'info@drccaremed.com',
            'company_address' => '196 Avenue Kapenda, Lubumbashi, 212700, République Démocratique du Congo',
            'facebook_url' => 'https://facebook.com/DRCCAREMedical',
            'seo_default_description_fr' => 'DRC CARE MEDICAL, branche de China Medical Care en RDC, fournit, achemine, installe et entretient du matériel médical et hospitalier à Lubumbashi, Kinshasa, Kasumbalesa et Kolwezi.',
            'seo_default_description_en' => 'DRC CARE MEDICAL, the DRC branch of China Medical Care, supplies, ships, installs and maintains medical and hospital equipment in Lubumbashi, Kinshasa, Kasumbalesa and Kolwezi.',
        ];

        foreach ($settings as $key => $value) {
            Setting::set($key, $value);
        }
    }
}
