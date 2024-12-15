<?php

namespace Database\Factories;

use App\Models\Avocat;
use App\Models\Cas;
use App\Models\Client;
use App\Models\Secretaire;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bureau>
 */
class BureauFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'idBureau' => $this->faker->unique()->randomNumber(),
            'nomBureau' => $this->faker->company(),
            'adresseBureau' => $this->faker->address(),
            'emailBureau' => $this->faker->safeEmail(),
            'idAv' => Avocat::factory(),
            'idSc' => Secretaire::factory(),
            'idCL' => Client::factory(),
            'idCa' => Cas::factory(),
        ];
    }
}
