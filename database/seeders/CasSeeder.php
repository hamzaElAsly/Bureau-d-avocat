<?php

namespace Database\Seeders;

use App\Models\Cas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cas::factory()->count(10)->create();
    }
}
