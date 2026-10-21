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
        Schema::create('business_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default('IKKY LAUNDRYIN COIN');
            $table->string('tagline')->default('Cuci Bersih, Praktis, Tanpa Ribet!');
            $table->string('sub_tagline')->default('Tinggal Masukkan Koin, Langsung Jalan!');
            $table->text('description')->nullable();
            $table->string('price_info')->default('Rp5.000 per kali cuci');
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('working_hours')->nullable();
            $table->string('google_maps_link')->nullable();
            $table->string('social_facebook')->nullable();
            $table->string('social_instagram')->nullable();
            $table->string('social_twitter')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business_profiles');
    }
};
