<?php

namespace Database\Factories;

use App\Models\Avocat;
use App\Models\Client;
use App\Models\Dossier;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bureau>
 */
class BureauFactory extends Factory
{
    public function definition(): array
    {
        return [
            'idBureau' => $this->faker->unique()->randomNumber(7),
            'nomBureau' => $this->faker->company(),
            'adresseBureau' => $this->faker->address(),
            'idAv' => Avocat::factory(),
            'idCL' => Client::factory(),
            'idDoss' => Dossier::factory(),
        ];
    }
}
