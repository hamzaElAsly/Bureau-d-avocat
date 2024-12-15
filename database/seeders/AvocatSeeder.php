<?php

namespace Database\Seeders;

use App\Models\Avocat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AvocatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Avocat::factory()->count(10)->create();
    }
}
