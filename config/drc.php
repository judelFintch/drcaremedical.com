<?php

return [
    // Adresse recevant les notifications de contact/devis.
    'notification_email' => env('CONTACT_NOTIFICATION_EMAIL', 'info@drccaremed.com'),

    'company' => [
        'name' => 'DRC CARE MEDICAL',
        'phone' => '+243 995 339 249',
        'phone_secondary' => '+243 850 323 211',
        'phones' => ['+243 995 339 249', '+243 850 323 211'],
        'email' => 'info@drccaremed.com',
        'address' => '196 Avenue Kapenda, Lubumbashi, 212700, République Démocratique du Congo',
        'facebook_url' => 'https://facebook.com/DRCCAREMedical',
        'parent_company_url' => 'https://www.chinacaremedical.com/',
        'cities' => ['Lubumbashi', 'Kinshasa', 'Kasumbalesa', 'Kolwezi'],
    ],

    // Organisations ayant explicitement autorisé l'affichage de leur identité.
    // Les autres logos peuvent être gérés depuis le module Partenaires.
    'trusted_organizations' => [
        [
            'name' => 'CMDC Clinique',
            'logo' => 'images/trusted/cmdc-clinique.png',
        ],
    ],
];
