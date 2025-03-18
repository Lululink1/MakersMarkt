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
        Schema::create('questions', function (Blueprint $table) {
        $table->id('question_id');
        $table->text('question_text');
        $table->unsignedBigInteger('created_by');
        $table->string('status')->default('draft');
        $table->timestamp('date_created')->useCurrent();
        $table->time('time_question')->nullable();

        $table->foreign('created_by')->references('user_id')->on('users');
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
