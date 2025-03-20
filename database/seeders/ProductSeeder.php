<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
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
        $sieraden = Category::where('Name', 'Sieraden')->first();
        $kunst = Category::where('Name', 'Kunst')->first();
        $houtwerk = Category::where('Name', 'Houtwerk')->first();

        DB::table('products')->insert([
            'ProductId' => 'PROD001',
            'Name' => 'Handgemaakte Ketting',
            'Description' => 'Een prachtige handgemaakte ketting met unieke details.',
            'Material' => 'Metaal',
            'ProductionTime' => now()->subDays(2),
            'Sustainability' => 'Duurzaam materiaal',
            'Price' => 29.99,
            'Stock' => 10,
            'category_id' => 1,
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
            'category_id' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('products')->insert([
            'ProductId' => 'PROD003',
            'Name' => 'Abstract Schilderij',
            'Description' => 'Een kleurrijk abstract schilderij dat elke kamer opfleurt.',
            'Material' => 'Canvas',
            'ProductionTime' => now()->subDays(7),
            'Sustainability' => 'Milieuvriendelijke verf',
            'Price' => 120.00,
            'Stock' => 3,
            'category_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('products')->insert([
            'ProductId' => 'PROD004',
            'Name' => 'Handgemaakte Armband',
            'Description' => 'Een elegante armband gemaakt van natuurlijke materialen.',
            'Material' => 'Leer',
            'ProductionTime' => now()->subDays(3),
            'Sustainability' => 'Natuurlijk leer',
            'Price' => 19.99,
            'Stock' => 15,
            'category_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('products')->insert([
            'ProductId' => 'PROD005',
            'Name' => 'Houten Vogelhuisje',
            'Description' => 'Een charmant vogelhuisje gemaakt van gerecycled hout.',
            'Material' => 'Hout',
            'ProductionTime' => now()->subDays(4),
            'Sustainability' => 'Gerecycled materiaal',
            'Price' => 35.00,
            'Stock' => 8,
            'category_id' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('products')->insert([
            'ProductId' => 'PROD006',
            'Name' => 'Keramische Vaas',
            'Description' => 'Een handgemaakte keramische vaas met een uniek ontwerp.',
            'Material' => 'Keramiek',
            'ProductionTime' => now()->subDays(6),
            'Sustainability' => 'Handgemaakt',
            'Price' => 60.00,
            'Stock' => 4,
            'category_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('products')->insert([
            'ProductId' => 'PROD007',
            'Name' => 'Houten Snijplank',
            'Description' => 'Een duurzame houten snijplank, perfect voor dagelijks gebruik.',
            'Material' => 'Hout',
            'ProductionTime' => now()->subDays(2),
            'Sustainability' => 'Duurzaam hout',
            'Price' => 25.00,
            'Stock' => 12,
            'category_id' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('products')->insert([
            'ProductId' => 'PROD008',
            'Name' => 'Handgemaakte Oorbellen',
            'Description' => 'Unieke oorbellen gemaakt van gerecyclede materialen.',
            'Material' => 'Metaal',
            'ProductionTime' => now()->subDays(1),
            'Sustainability' => 'Gerecycled materiaal',
            'Price' => 15.99,
            'Stock' => 20,
            'category_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('products')->insert([
            'ProductId' => 'PROD009',
            'Name' => 'Abstract Beeldhouwwerk',
            'Description' => 'Een modern beeldhouwwerk dat een statement maakt.',
            'Material' => 'Steen',
            'ProductionTime' => now()->subDays(10),
            'Sustainability' => 'Handgemaakt',
            'Price' => 250.00,
            'Stock' => 2,
            'category_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('products')->insert([
            'ProductId' => 'PROD010',
            'Name' => 'Houten Fotolijst',
            'Description' => 'Een rustieke houten fotolijst voor je mooiste herinneringen.',
            'Material' => 'Hout',
            'ProductionTime' => now()->subDays(3),
            'Sustainability' => 'Gerecycled hout',
            'Price' => 18.50,
            'Stock' => 10,
            'category_id' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
