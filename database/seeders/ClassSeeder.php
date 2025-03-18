<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('classes')->insert([
            ['class_name' => 'Default Class', 'class_code' => 'DEF123'],
        ]);
    }
}
