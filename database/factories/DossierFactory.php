<?php

namespace Database\Factories;

use App\Models\Avocat;
use App\Models\Client;
use App\Models\Cas;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dossier>
 */
class DossierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nomDossier' => $this->faker->unique()->bothify('DOS-####'),
            'titre' => $this->faker->sentence(4),
            'numero_dossier' => $this->faker->unique()->bothify('DOS-####'),
            'idAv' => Avocat::factory(),
            'assigned_user_id' => User::factory(),
            'idCl' => Client::factory(),
            'idCa' => Cas::factory(),
            'dateDossier' => $this->faker->date(),
            'date_fermeture' => null,
            'etat' => 'en cours',
            'statut' => $this->faker->randomElement(\App\Models\Dossier::STATUTS),
            'priorite' => $this->faker->randomElement(\App\Models\Dossier::PRIORITES),
            'description' => $this->faker->paragraph(),
        ];
    }
}
