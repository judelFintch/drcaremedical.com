<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DevAdminSeeder extends Seeder
{
    /**
     * Réservé au développement local : crée un compte admin à partir de
     * ADMIN_EMAIL/ADMIN_PASSWORD (.env). Ne s'exécute jamais en production.
     * Pour la production, utiliser `php artisan drc:make-admin` à la place.
     */
    public function run(): void
    {
        if (! app()->environment('local', 'testing')) {
            return;
        }

        $email = env('ADMIN_EMAIL', 'admin@drccaremed.test');
        $password = env('ADMIN_PASSWORD', 'DevAdmin#2026Local');

        User::query()->updateOrCreate(
            ['email' => $email],
            [
                'name' => 'Administrateur (développement)',
                'password' => Hash::make($password),
                'is_admin' => true,
                'is_active' => true,
                'email_verified_at' => now(),
            ]
        );

        $this->command?->warn("Admin de développement : {$email} / mot de passe défini via ADMIN_PASSWORD (voir .env).");
    }
}
