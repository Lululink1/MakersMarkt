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
       Schema::create('challenges', function (Blueprint $table) {
        $table->id('challenge_id');
        $table->unsignedBigInteger('class_id');
        $table->string('title');
        $table->integer('week_number');
        $table->text('description')->nullable();
        $table->string('status')->default('open');
        $table->timestamps();

        $table->foreign('class_id')->references('class_id')->on('classes');
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('challenges');
    }
};
