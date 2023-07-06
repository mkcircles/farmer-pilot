<?php

use Database\Seeders\FPODataSeeder;
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
            $table->string('county')->nullable()->default(null);
            $table->string('sub_county');
            $table->string('parish');
            $table->string('village');
            $table->string('fpo_cordinates')->nullable()->default(null);
            $table->string('main_crop');
            $table->string('fpo_contact_name');
            $table->string('contact_phone_number');
            $table->string('contact_email')->nullable()->default(null);
            $table->string('core_staff_count')->nullable()->default(null);
            $table->string('core_staff_positions')->nullable()->default(null);
            $table->string('registration_status')->nullable()->default(null);
            $table->string('fpo_membership_number')->nullable()->default(null);
            $table->string('fpo_male_membership')->nullable()->default(null);
            $table->string('fpo_female_membership')->nullable()->default(null);
            $table->string('fpo_male_youth')->nullable()->default(null);
            $table->string('fpo_female_youth')->nullable()->default(null);
            $table->string('fpo_field_agents')->nullable()->default(null);
            $table->string('Cert_of_Inc')->nullable()->default(null);
            $table->integer('created_by')->nullable();
            $table->timestamps();
        });

        

        //Call the seeder
        Artisan::call('db:seed', [
            '--class' => FPOSeeder::class,
            '--force' => true
        ]);
        //Call the seeder
        Artisan::call('db:seed', [
            '--class' => FPODataSeeder::class,
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
