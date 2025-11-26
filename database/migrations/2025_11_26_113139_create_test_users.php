<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin Test',
                'email' => 'admin@test.com',
                'password' => Hash::make('password'),
                'is_admin' => 1,
                'is_operator' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Operator Test',
                'email' => 'operator@test.com',
                'password' => Hash::make('password'),
                'is_admin' => 0,
                'is_operator' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    public function down(): void
    {
        DB::table('users')
            ->whereIn('email', ['admin@test.com', 'operator@test.com'])
            ->delete();
    }
};
