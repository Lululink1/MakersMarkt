<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        // Zorg dat je eerst users hebt (bijvoorbeeld met ID 1, 2 en 3)
        DB::table('orders')->insert([
            [
                'user_id' => 1, // koper
                'seller_id' => 2, // verkoper/maker
                'status' => 'In behandeling',
                'description' => 'Bestelling voor admin gebruiker',
                'shipping_method' => 'PostNL',
                'payment_method' => 'iDeal',
                'date' => Carbon::now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2, // koper
                'seller_id' => 3, // verkoper/maker
                'status' => 'Verzonden',
                'description' => 'Bestelling voor user1',
                'shipping_method' => 'PostNL',
                'payment_method' => 'PayPal',
                'date' => Carbon::now()->subDays(2),
                'created_at' => now()->subDays(2),
                'updated_at' => now()->subDay(),
            ],
        ]);
    }
}
