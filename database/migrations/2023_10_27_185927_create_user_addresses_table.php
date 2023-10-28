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
        Schema::create('user_addresses', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->text('address');
            $table->string('cellphone');
            $table->string('postal_code');
            
            $table->foreignId('user_id');
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();

            $table->foreignId('province_id');
            $table->foreign('province_id')->references('id')->on('provinces')->cascadeOnDelete();

            $table->foreignId('city_id');
            $table->foreign('city_id')->references('id')->on('cities')->cascadeOnDelete();

            $table->string('longitude')->nullable();
            $table->string('latitude')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_addresses');
    }
};
