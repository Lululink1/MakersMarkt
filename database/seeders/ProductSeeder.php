<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'ProductId' => 'PROD001',
            'Name' => 'Handgemaakte Ketting',
            'Description' => 'Een prachtige handgemaakte ketting met unieke details.',
            'Material' => 'Metaal',
            'ProductionTime' => now()->subDays(2),
            'Sustainability' => 'Duurzaam materiaal',
            'Price' => 29.99,
            'Stock' => 10,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('products')->insert([
            'ProductId' => 'PROD002',
            'Name' => 'Houten Schaal',
            'Description' => 'Een met de hand gesneden houten schaal, perfect voor decoratie.',
            'Material' => 'Hout',
            'ProductionTime' => now()->subDays(5),
            'Sustainability' => 'Hergebruikt hout',
            'Price' => 45.50,
            'Stock' => 5,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('products')->insert([
            'ProductId' => 'PROD003',
            'Name' => 'Gebreide Trui',
            'Description' => 'Een warme en comfortabele handgebreide trui van zachte wol.',
            'Material' => 'Wol',
            'ProductionTime' => now()->subDays(10),
            'Sustainability' => 'Ethisch geproduceerd',
            'Price' => 79.00,
            'Stock' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('products')->insert([
            'ProductId' => 'PROD004',
            'Name' => 'Keramieken Vaas',
            'Description' => 'Een unieke handgemaakte keramieken vaas voor bloemen.',
            'Material' => 'Keramiek',
            'ProductionTime' => now()->subDays(3),
            'Sustainability' => 'Lokaal geproduceerd',
            'Price' => 35.00,
            'Stock' => 8,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('products')->insert([
            'ProductId' => 'PROD005',
            'Name' => 'Leren Portemonnee',
            'Description' => 'Een stijlvolle handgemaakte leren portemonnee.',
            'Material' => 'Leer',
            'ProductionTime' => now()->subDays(7),
            'Sustainability' => 'Ethisch leer',
            'Price' => 49.99,
            'Stock' => 12,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('products')->insert([
            'ProductId' => 'PROD006',
            'Name' => 'Geweven Mand',
            'Description' => 'Een handgeweven mand, ideaal voor opslag of decoratie.',
            'Material' => 'Riet',
            'ProductionTime' => now()->subDays(4),
            'Sustainability' => 'Natuurlijk materiaal',
            'Price' => 25.00,
            'Stock' => 15,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('products')->insert([
            'ProductId' => 'PROD007',
            'Name' => 'Handgemaakte Mok',
            'Description' => 'Een unieke keramische mok, perfect voor warme dranken.',
            'Material' => 'Keramiek',
            'ProductionTime' => now()->subDays(6),
            'Sustainability' => 'Lokaal geproduceerd',
            'Price' => 15.00,
            'Stock' => 20,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('products')->insert([
            'ProductId' => 'PROD008',
            'Name' => 'Zijden Sjaal',
            'Description' => 'Een elegante handgemaakte zijden sjaal.',
            'Material' => 'Zijde',
            'ProductionTime' => now()->subDays(8),
            'Sustainability' => 'Ethisch geproduceerd',
            'Price' => 60.00,
            'Stock' => 7,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('products')->insert([
            'ProductId' => 'PROD009',
            'Name' => 'Handgemaakte Kaars',
            'Description' => 'Een met de hand gegoten kaars met een heerlijke geur.',
            'Material' => 'Sojawas',
            'ProductionTime' => now()->subDays(2),
            'Sustainability' => 'Duurzaam materiaal',
            'Price' => 12.50,
            'Stock' => 25,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('products')->insert([
            'ProductId' => 'PROD010',
            'Name' => 'Houten Fotolijst',
            'Description' => 'Een handgemaakte houten fotolijst voor uw mooiste herinneringen.',
            'Material' => 'Hout',
            'ProductionTime' => now()->subDays(3),
            'Sustainability' => 'Hergebruikt hout',
            'Price' => 20.00,
            'Stock' => 10,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
