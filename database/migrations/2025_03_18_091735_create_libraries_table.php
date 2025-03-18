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
       Schema::create('libraries', function (Blueprint $table) {
            $table->id('library_id');
            $table->string('title');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('created_by');
            $table->timestamp('date_created')->useCurrent();

            $table->foreign('created_by')->references('user_id')->on('users');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('libraries');
    }
};
