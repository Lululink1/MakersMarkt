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
        Schema::create('leaderboards', function (Blueprint $table) {
        $table->id('leaderboard_id');
        $table->unsignedBigInteger('class_id');
        $table->integer('week_number');
        $table->integer('rank');
        $table->integer('points');
        $table->timestamps();

        $table->foreign('class_id')->references('class_id')->on('classes');
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leaderboards');
    }
};
