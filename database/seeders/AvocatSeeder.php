<?php

namespace Database\Seeders;

use App\Models\Avocat;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AvocatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $avocats = [
            [
                'idAvocat' => 1001,
                'nomAvocat' => 'Bennani',
                'prenomAvocat' => 'Hamza',
                'telAvocat' => 610100101,
                'emailAvocat' => 'hamza.bennani@example.test',
                'passAvocat' => Hash::make('Password123'),
                'specialiste' => 'Commercial',
                'imageAvocat' => null,
            ],
            [
                'idAvocat' => 1002,
                'nomAvocat' => 'Berrada',
                'prenomAvocat' => 'Sara',
                'telAvocat' => 610100102,
                'emailAvocat' => 'sara.berrada@example.test',
                'passAvocat' => Hash::make('Password123'),
                'specialiste' => 'Familial',
                'imageAvocat' => null,
            ],
            [
                'idAvocat' => 1003,
                'nomAvocat' => 'Tazi',
                'prenomAvocat' => 'Othmane',
                'telAvocat' => 610100103,
                'emailAvocat' => 'othmane.tazi@example.test',
                'passAvocat' => Hash::make('Password123'),
                'specialiste' => 'Immobilier',
                'imageAvocat' => null,
            ],
            [
                'idAvocat' => 1004,
                'nomAvocat' => 'Chraibi',
                'prenomAvocat' => 'Kawtar',
                'telAvocat' => 610100104,
                'emailAvocat' => 'kawtar.chraibi@example.test',
                'passAvocat' => Hash::make('Password123'),
                'specialiste' => 'Social',
                'imageAvocat' => null,
            ],
        ];

        foreach ($avocats as $avocat) {
            Avocat::updateOrCreate(['idAvocat' => $avocat['idAvocat']], $avocat);
        }
    }
}
