<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('reviews')->insert([
            [
                'ProductId' => 1,
                'UserId' => 1,
                'Rating' => 5,
                'Feedback' => 'Uitstekend product, zeer tevreden!',
                'Datum' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'ProductId' => 1,
                'UserId' => 2,
                'Rating' => 4,
                'Feedback' => 'Werkt goed, maar verpakking kan beter.',
                'Datum' => Carbon::now()->subDays(2),
                'created_at' => Carbon::now()->subDays(2),
                'updated_at' => Carbon::now()->subDays(2),
            ],
            [
                'ProductId' => 2,
                'UserId' => 1,
                'Rating' => 3,
                'Feedback' => 'Prima product, maar ik mis wat uitleg.',
                'Datum' => Carbon::now()->subWeek(),
                'created_at' => Carbon::now()->subWeek(),
                'updated_at' => Carbon::now()->subWeek(),
            ],
            [
                'ProductId' => 3,
                'UserId' => 2,
                'Rating' => 5,
                'Feedback' => 'Superhandig, precies wat ik nodig had!',
                'Datum' => Carbon::now()->subDays(1),
                'created_at' => Carbon::now()->subDays(1),
                'updated_at' => Carbon::now()->subDays(1),
            ],
        ]);
    }
}
