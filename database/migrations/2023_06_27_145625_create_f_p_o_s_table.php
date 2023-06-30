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
        Schema::create('f_p_o_s', function (Blueprint $table) {
            $table->id();
            $table->string('fpo_name');
            $table->string('district');
            $table->string('county');
            $table->string('sub_county');
            $table->string('parish');
            $table->string('village');
            $table->string('main_crop');
            $table->integer('fpo_member_count');
            $table->string('fpo_contact_name');
            $table->string('contact_phone_number');
            $table->string('Cert_of_Inc')->nullable()->default(null);
            $table->integer('created_by')->nullable();
            $table->timestamps();
        });

        //Call the seeder
        Artisan::call('db:seed', [
            '--class' => FPOSeeder::class,
            '--force' => true
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('f_p_o_s');
    }
};
