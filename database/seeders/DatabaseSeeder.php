<?php

namespace Database\Seeders;

use App\Models\Dossier;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Crée un utilisateur de test et des données de démonstration stables
        // pour les modules Phase 1 (Clients, Dossiers).
        User::updateOrCreate(
            ['email' => 'admin@avocat.test'],
            ['name' => 'Admin Avocat', 'password' => bcrypt('password')]
        );

        $this->call([
            CasSeeder::class,
            ClientSeeder::class,
        ]);

        if (Dossier::count() === 0) {
            Dossier::factory()->count(10)->create();
        }
    }
}
