<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
        $table->id();
        $table->string('ProductId')->unique();
        $table->string('Name');
        $table->text('Description');
        $table->string('Material');
        $table->dateTime('ProductionTime');
        $table->string('Sustainability');
        $table->decimal('Price', 8, 2);
        $table->integer('Stock');
        $table->foreignId('category_id')->constrained('categories', 'CategoryId');
        $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
