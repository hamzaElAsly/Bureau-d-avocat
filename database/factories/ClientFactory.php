<?php

namespace Database\Factories;

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
            'nomClient' => $this->faker->lastName(),
            'prenomClient' => $this->faker->firstName(),
            'tel1' => $this->faker->numberBetween(600000000, 799999999),
            'tel2' => $this->faker->optional()->numberBetween(600000000, 799999999),
            'emailClient' => $this->faker->unique()->safeEmail(),
            'adressClient' => $this->faker->address(),
            'imageClient' => null,
            'type_client' => $this->faker->randomElement(['particulier', 'entreprise']),
            'statut' => $this->faker->randomElement(['actif', 'inactif']),
        ];
    }
}
