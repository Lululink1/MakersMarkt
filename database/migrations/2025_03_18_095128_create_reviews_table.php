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
        Schema::create('reviews', function (Blueprint $table) {
    $table->id('ReviewId');
    $table->unsignedBigInteger('ProductId');
    $table->unsignedBigInteger('UserId');
    $table->integer('Rating');
    $table->text('Feedback');
    $table->dateTime('Datum');
    $table->timestamps();

    $table->foreign('ProductId')->references('ProductId')->on('products')->onDelete('cascade');
    $table->foreign('UserId')->references('UserId')->on('users')->onDelete('cascade');
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
