<?php

namespace Database\Factories;

use App\Models\Dossier;
use App\Models\Tribunal;
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
            'id_Dossier' => Dossier::factory(),
            'id_Tribunal' => Tribunal::factory(),
            'dateAudience' => $this->faker->date(),
        ];
    }
}
