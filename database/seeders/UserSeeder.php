<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'nom' => 'El Amrani',
                'prenon' => 'Youssef',
                'tel' => 612345678,
                'email' => 'youssef.elamrani@example.test',
                'password' => Hash::make('Password123'),
                'image' => null,
            ],
            [
                'nom' => 'Alaoui',
                'prenon' => 'Salma',
                'tel' => 612345679,
                'email' => 'salma.alaoui@example.test',
                'password' => Hash::make('Password123'),
                'image' => null,
            ],
            [
                'nom' => 'Idrissi',
                'prenon' => 'Imane',
                'tel' => 612345680,
                'email' => 'imane.idrissi@example.test',
                'password' => Hash::make('Password123'),
                'image' => null,
            ],
        ];

        foreach ($users as $user) {
            User::updateOrCreate(['email' => $user['email']], $user);
        }
    }
}
