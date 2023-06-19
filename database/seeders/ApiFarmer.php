<?php

namespace Database\Seeders;

use App\Models\FarmerProfile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApiFarmer extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Generate 100 farmer profiles
        FarmerProfile::factory()->count(100)->create();
        
    }
}
