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
       Schema::create('responses', function (Blueprint $table) {
        $table->id('response_id');
        $table->unsignedBigInteger('question_id');
        $table->text('response_text');
        $table->unsignedBigInteger('created_by');
        $table->string('status')->default('pending');
        $table->timestamp('date_created')->useCurrent();
        $table->time('time_response')->nullable();

        $table->foreign('question_id')->references('question_id')->on('questions');
        $table->foreign('created_by')->references('user_id')->on('users');
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('responses');
    }
};
