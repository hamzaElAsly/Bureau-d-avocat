<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cas>
 */
class CasFactory extends Factory
{
    public function definition(): array
    {
        return [
            'idCas' => $this->faker->unique()->randomNumber(7),
            'listeCas' => $this->faker->randomElement([
                'Civil', 'Pénal', 'Commercial', 'Familial', 'Social', 'Immobilier', 'Administratif',
            ]),
        ];
    }
}
