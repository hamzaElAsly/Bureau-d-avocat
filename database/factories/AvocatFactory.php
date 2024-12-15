<?php

namespace Database\Factories;

use App\Models\Bureau;
use App\Models\Cas;
use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Avocat>
 */
class AvocatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'idAvocat' => $this->faker->unique()->randomNumber(),
            'nomAvocat' => $this->faker->lastName(),
            'prenomAvocat' => $this->faker->firstName(),
            'telAvocat' => $this->faker->phoneNumber(),
            'emailAvocat' => $this->faker->safeEmail(),
            'passAvocat' => $this->faker->password(),
            'idCl' => Client::factory(),
            'idCa' => Cas::factory(),
            'idBr' => Bureau::factory(),
        ];
    }
}
