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
        Schema::table('business_profiles', function (Blueprint $table) {
            $table->string('owner_name')->nullable()->after('description');
            $table->string('owner_title')->nullable()->after('owner_name');
            $table->text('owner_bio')->nullable()->after('owner_title');
            $table->string('owner_photo')->nullable()->after('owner_bio');
            $table->string('whatsapp_number')->nullable()->after('phone');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('business_profiles', function (Blueprint $table) {
            $table->dropColumn(['owner_name', 'owner_title', 'owner_bio', 'owner_photo', 'whatsapp_number']);
        });
    }
};
