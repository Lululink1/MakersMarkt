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
        Schema::create('users', function (Blueprint $table) {
            $table->id('user_id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->unsignedBigInteger('class_id')->nullable();
            $table->string('profile_photo_url')->nullable();
            $table->boolean('public_profile')->default(false);
            $table->boolean('push_notifications')->default(false);
            $table->unsignedBigInteger('role_id');
            $table->timestamps();

            $table->foreign('class_id')->references('class_id')->on('classes')->nullOnDelete();
            $table->foreign('role_id')->references('role_id')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
