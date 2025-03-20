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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            // Koper van de order (klant)
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            // Verkoper / Maker van het product (eigenaar)
            $table->unsignedBigInteger('seller_id')->nullable(); // <--- NIEUW
            $table->foreign('seller_id')->references('id')->on('users')->onDelete('cascade');

            // Orderinformatie
            $table->string('status')->default('In behandeling');
            $table->string('description')->nullable();
            $table->dateTime('date');

            // Verzend- en betaalmethode
            $table->string('shipping_method')->nullable();
            $table->string('payment_method')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
