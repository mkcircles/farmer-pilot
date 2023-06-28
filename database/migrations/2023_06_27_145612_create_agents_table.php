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
            $table->string('email')->unique()->nullable();
            $table->string('phone_number')->unique();
            $table->string('age');
            $table->enum('gender',['male','female']);
            $table->string('residence');
            $table->string('referee_name');
            $table->string('referee_phone_number');
            $table->string('designation');
            $table->string('photo')->nullable();
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('fpo_id')->nullable();
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
