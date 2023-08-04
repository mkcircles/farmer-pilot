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
        Schema::create('mastercard_profile_details', function (Blueprint $table) {
            $table->id();
            $table->string('entityType');
            $table->string('entityID');
            $table->string('rID')->nullable();
            $table->string('consentGUID')->nullable();
            $table->string('subjectID')->nullable();
            $table->string('enrollmentStatus')->nullable();
            $table->boolean('hasBiometricToken')->nullable();
            $table->longText('biometricToken')->nullable();
            $table->string('consumerDeviceId')->nullable();
            $table->string('possible_duplicate')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mastercard_profile_details');
    }
};
