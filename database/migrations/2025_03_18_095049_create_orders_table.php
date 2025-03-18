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
        $table->id('OrderId');
        $table->unsignedBigInteger('UserId');
        $table->string('Status');
        $table->string('Description')->nullable();
        $table->dateTime('date');
        $table->timestamps();

        $table->foreign('UserId')->references('UserId')->on('users')->onDelete('cascade');
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
