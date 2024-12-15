<?php

namespace Database\Factories;

use App\Models\Dossier;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Audience>
 */
class AudienceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'idAudience' => $this->faker->unique()->randomNumber(),
            'dateAudience' => $this->faker->date(),
            'lieu' => $this->faker->city(),
            'defendeur' => $this->faker->name(),
            'demandeur' => $this->faker->name(),
            'audience_idDossier' => Dossier::factory(),
        ];
    }
}
