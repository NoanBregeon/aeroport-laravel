<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTestSeeder extends Seeder
{
    public function run(): void
    {
        // Compte admin
        User::updateOrCreate(
            ['email' => 'admin@aeroport.test'],
            [
                'name' => 'Admin',
                'password' => Hash::make('password'),
                'is_admin' => 1,
                'is_operator' => 0,
            ]
        );

        // Compte operator
        User::updateOrCreate(
            ['email' => 'operator@aeroport.test'],
            [
                'name' => 'Operator',
                'password' => Hash::make('password'),
                'is_admin' => 0,
                'is_operator' => 1,
            ]
        );
    }
}
