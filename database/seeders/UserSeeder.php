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
                'Username' => 'admin',
                'Password' => Hash::make('password'),
                'Email' => 'admin@example.com',
                'Role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Username' => 'john_doe',
                'Password' => Hash::make('password'),
                'Email' => 'john@example.com',
                'Role' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Username' => 'jane_doe',
                'Password' => Hash::make('password'),
                'Email' => 'jane@example.com',
                'Role' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}