<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->nullable()->default(null);
            $table->string('phone_number')->nullable()->default(null);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('role',['admin','agent','user','fpo'])->default('user');
            $table->string('photo')->nullable();
            $table->string('entity_id')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        //Call the seeder
        Artisan::call('db:seed', [
            '--class' => UserSeeder::class,
            '--force' => true
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
