<?php

namespace Database\Factories;

use App\Models\Avocat;
use App\Models\Bureau;
use App\Models\Client;
use App\Models\Dossier;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cas>
 */
class CasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'idCas' => $this->faker->unique()->randomNumber(),
            'cas_idAvocat' => Avocat::factory(),
            'cas_idClient' => Client::factory(),
            'cas_idDossier' => Dossier::factory(),
            'idBr' => Bureau::factory(),
        ];
    }
}
