<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Region>
 */
class RegionFactory extends Factory
{
    public function definition(): array
    {
        return [
            'idRegion' => $this->faker->unique()->randomNumber(7),
            'nomRegion' => $this->faker->randomElement([
                'Casablanca-Settat',
                'Rabat-Salé-Kénitra',
                'Fès-Meknès',
                'Marrakech-Safi',
                'Tanger-Tétouan-Al Hoceïma',
            ]),
        ];
    }
}
