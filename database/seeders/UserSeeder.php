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
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
                'class_id' => 1,
                'profile_photo_url' => 'https://example.com/images/admin.png',
                'public_profile' => true,
                'push_notifications' => true,
                'role_id' => 1, // Admin
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Regular User One',
                'email' => 'user1@example.com',
                'password' => Hash::make('password'),
                'class_id' => 1,
                'profile_photo_url' => 'https://example.com/images/user1.png',
                'public_profile' => false,
                'push_notifications' => true,
                'role_id' => 2, // User
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Regular User Two',
                'email' => 'user2@example.com',
                'password' => Hash::make('password'),
                'class_id' => 1,
                'profile_photo_url' => 'https://example.com/images/user2.png',
                'public_profile' => false,
                'push_notifications' => false,
                'role_id' => 2, // User
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
