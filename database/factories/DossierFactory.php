<?php

namespace Database\Factories;

use App\Models\Cas;
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
            'idDossier' => $this->faker->unique()->randomNumber(),
            'nomDossier' => $this->faker->word(),
            'contenu' => $this->faker->paragraph(),
            'dateDossier' => $this->faker->date(),
            'prix' => $this->faker->randomFloat(2, 100, 1000),
            'idCa' => Cas::factory(),
        ];
    }
}