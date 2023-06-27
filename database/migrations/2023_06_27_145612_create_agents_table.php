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
        Schema::create('agents', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique()->nullable()->default(null);
            $table->string('phone_number')->unique();
            $table->string('age');
            $table->string('residence');
            $table->string('referee_name');
            $table->string('referee_phone_number');
            $table->enum('designation',['Agro Extension Worker','Digital Entrepreneur']);
            $table->string('photo')->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agents');
    }
};
