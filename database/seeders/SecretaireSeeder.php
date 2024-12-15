<?php

namespace Database\Seeders;

use App\Models\Secretaire;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SecretaireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Secretaire::factory()->count(10)->create();
    }
}
