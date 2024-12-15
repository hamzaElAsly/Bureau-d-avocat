<?php

namespace Database\Factories;

use App\Models\Audience;
use App\Models\Bureau;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'idClient' => $this->faker->unique()->randomNumber(),
            'nomClient' => $this->faker->lastName(),
            'prenomClient' => $this->faker->firstName(),
            'tel1' => $this->faker->phoneNumber(),
            'tel2' => $this->faker->phoneNumber(),
            'emailClient' => $this->faker->safeEmail(),
            'idAud' => Audience::factory(),
            'idBr' => Bureau::factory(),
        ];
    }
}
