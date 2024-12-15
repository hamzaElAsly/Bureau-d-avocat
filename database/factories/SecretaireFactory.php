<?php

namespace Database\Factories;

use App\Models\Avocat;
use App\Models\Bureau;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Secretaire>
 */
class SecretaireFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'idSec' => $this->faker->unique()->randomNumber(),
            'nomSec' => $this->faker->lastName(),
            'prenomSec' => $this->faker->firstName(),
            'telSec' => $this->faker->phoneNumber(),
            'emailSec' => $this->faker->safeEmail(),
            'passSec' => $this->faker->password(),
            'salaire' => $this->faker->numberBetween(2000, 5000),
            'idAv' => Avocat::factory(),
            'idBr' => Bureau::factory(),
        ];
    }
}
