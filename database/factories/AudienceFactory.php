<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Audience>
 */
class AudienceFactory extends Factory
{
    public function definition(): array
    {
        return [
            'idAudience' => $this->faker->unique()->randomNumber(7),
            'dateAudience' => $this->faker->date(),
        ];
    }
}
