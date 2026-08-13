<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Secretaire>
 */
class SecretaireFactory extends Factory
{
    public function definition(): array
    {
        return [
            'idSec' => $this->faker->unique()->randomNumber(7),
            'nomSec' => $this->faker->lastName(),
            'prenomSec' => $this->faker->firstName(),
            'telSec' => $this->faker->numerify('06########'),
            'emailSec' => $this->faker->unique()->safeEmail(),
            'passSec' => $this->faker->password(),
            'salaire' => $this->faker->numberBetween(2000, 5000),
        ];
    }
}
