<?php

namespace Database\Factories;

use App\Models\Region;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tribunal>
 */
class TribunalFactory extends Factory
{
    public function definition(): array
    {
        return [
            'idTribunal' => $this->faker->unique()->randomNumber(7),
            'id_Region' => Region::factory(),
            'nomTribunal' => $this->faker->randomElement([
                'Tribunal de première instance de Casablanca',
                'Tribunal de commerce de Rabat',
                'Tribunal de première instance de Fès',
                'Tribunal de première instance de Marrakech',
            ]),
        ];
    }
}
