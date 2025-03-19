<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'ProductId' => 'P001',
                'Name' => 'Fitness Planner',
                'Description' => 'Een fantastisch product dat je leven gemakkelijker maakt.',
                'Material' => 'Hout, Kunststof',
                'ProductionTime' => Carbon::now(),
                'Sustainability' => 'Hernieuwbaar',
                'Price' => 29.99,
                'Stock' => 150,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'ProductId' => 'P002',
                'Name' => 'E-books',
                'Description' => 'Dit product biedt de perfecte oplossing voor dagelijks gebruik.',
                'Material' => 'Digitale bestanden',
                'ProductionTime' => Carbon::now(),
                'Sustainability' => 'E-paper',
                'Price' => 19.99,
                'Stock' => 500,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'ProductId' => 'P003',
                'Name' => 'Sjablonen',
                'Description' => 'Een innovatief product dat je niet wilt missen.',
                'Material' => 'Digitale bestanden',
                'ProductionTime' => Carbon::now(),
                'Sustainability' => 'Digitale distributie',
                'Price' => 9.99,
                'Stock' => 250,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
