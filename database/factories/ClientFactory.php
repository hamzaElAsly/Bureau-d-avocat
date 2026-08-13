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
            'tel1' => $this->faker->numerify('06########'),
            'tel2' => $this->faker->numerify('06########'),
            'emailClient' => $this->faker->unique()->safeEmail(),
            'adressClient' => $this->faker->address(),
            'imageClient' => null,
        ];
    }
}
