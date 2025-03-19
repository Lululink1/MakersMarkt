<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'username' => 'admin',
                'password' => Hash::make('password'),
                'email' => 'admin@example.com',
                'role' => 'admin',
                'full_name' => 'Admin User',
                'house_number' => '1A',
                'postal_code' => '1234AB',
                'city' => 'Amsterdam',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'user1',
                'password' => Hash::make('password'),
                'email' => 'user1@example.com',
                'role' => 'user',
                'full_name' => 'Jan Jansen',
                'house_number' => '12B',
                'postal_code' => '5678CD',
                'city' => 'Rotterdam',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'user2',
                'password' => Hash::make('password'),
                'email' => 'user2@example.com',
                'role' => 'user',
                'full_name' => 'Piet Pietersen',
                'house_number' => '34C',
                'postal_code' => '9101EF',
                'city' => 'Utrecht',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
