<?php

namespace Database\Seeders;

use App\Models\TeamMember;
use Illuminate\Database\Seeder;

class TeamMemberSeeder extends Seeder
{
    public function run(): void
    {
        $members = [
            ['name' => 'Membre de l\'équipe — démonstration', 'role_fr' => 'Responsable technique', 'role_en' => 'Technical Manager', 'city' => 'Lubumbashi'],
            ['name' => 'Membre de l\'équipe — démonstration', 'role_fr' => 'Responsable logistique', 'role_en' => 'Logistics Manager', 'city' => 'Kinshasa'],
            ['name' => 'Membre de l\'équipe — démonstration', 'role_fr' => 'Technicien biomédical', 'role_en' => 'Biomedical Technician', 'city' => 'Lubumbashi'],
        ];

        foreach ($members as $index => $data) {
            TeamMember::factory()->create([
                ...$data,
                'bio' => 'Biographie à compléter par DRC CARE MEDICAL.',
                'photo' => null,
                'order' => $index,
                'is_published' => true,
            ]);
        }
    }
}
