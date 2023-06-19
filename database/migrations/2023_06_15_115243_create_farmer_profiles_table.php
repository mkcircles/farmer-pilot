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
        Schema::create('farmer_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->date('dob');
            $table->enum('gender',['male','female']);
            $table->string('education_level')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('id_number')->nullable();
            $table->enum('marital_status',['single','married','divorced','widowed']);
            $table->string('district');
            $table->string('county');
            $table->string('sub_county');
            $table->string('parish');
            $table->string('village');
            $table->string('fpo_name');
            $table->string('farmer_cordinates')->nullable();
            $table->string('next_of_kin')->nullable();
            $table->string('next_of_kin_contact')->nullable();
            $table->string('next_of_kin_relationship')->nullable();
            //House Hold Information
            $table->string('male_members_in_household')->nullable();
            $table->string('female_members_in_household')->nullable();
            $table->string('members_above_18')->nullable();
            $table->string('children_below_5')->nullable();
            $table->string('school_going_children')->nullable();
            $table->string('head_of_family')->nullable();
            //Finance Information
            $table->string('how_much_do_you_earn_from_agricultural_activities')->nullable();
            $table->string('how_much_do_you_earn_from_non_agricultural_activities')->nullable();
            $table->string('do_you_have_an_account_with_an_FI')->nullable();

            //Farm Information
            $table->string('farm_size')->nullable();
            $table->string('farm_size_under_agriculture')->nullable();
            $table->enum('land_ownership',['private','leased','rented','customary tenure'])->nullable();

            //Crop Information
            $table->enum('type_of_farming',['crop','animals','mixed'])->nullable();
            $table->string('crops_grown')->nullable();
            $table->string('animals_kept')->nullable();
            $table->string('estimated_produce_value_last_season')->nullable();
            $table->string('estimated_produce_value_this_season')->nullable();

            //Other Information
            $table->string('rId')->nullable();
            $table->string('consumerDeviceId')->nullable();
            $table->string('data_captured_by')->nullable();

            
            $table->timestamps();
        });

        //Call the seeder
        Artisan::call('db:seed', [
            '--class' => ApiFarmer::class,
            '--force' => true,
        ]);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('farmer_profiles');
    }
};
