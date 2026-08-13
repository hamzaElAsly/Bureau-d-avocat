<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Avocat>
 */
class AvocatFactory extends Factory
{
    public function definition(): array
    {
        return [
            'idAvocat' => $this->faker->unique()->randomNumber(7),
            'nomAvocat' => $this->faker->lastName(),
            'prenomAvocat' => $this->faker->firstName(),
            'telAvocat' => $this->faker->numerify('06########'),
            'emailAvocat' => $this->faker->unique()->safeEmail(),
            'passAvocat' => $this->faker->password(),
            'specialiste' => $this->faker->word(),
        ];
    }
}
