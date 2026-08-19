<?php

namespace Database\Seeders;

use App\Models\Cas;
use Illuminate\Database\Seeder;

class CasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cases = [
            ['idCas' => 2001, 'listeCas' => 'Commercial'],
            ['idCas' => 2002, 'listeCas' => 'Familial'],
            ['idCas' => 2003, 'listeCas' => 'Immobilier'],
            ['idCas' => 2004, 'listeCas' => 'Pénal'],
            ['idCas' => 2005, 'listeCas' => 'Administratif'],
            ['idCas' => 2006, 'listeCas' => 'Social'],
        ];

        foreach ($cases as $case) {
            Cas::updateOrCreate(['idCas' => $case['idCas']], $case);
        }
    }
}
