<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FPOSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fpos = [
            [
                'fpo_name' => 'Root FPO',
                'district' => 'Kampala',
                'county' => 'Kampala',
                'sub_county' => 'Kampala',
                'parish' => 'Kampala',
                'village' => 'Kampala',
                'main_crop' => 'Maize',
                'fpo_member_count' => 100,
                'fpo_contact_name' => 'Maurice Kamugisha',
                'contact_phone_number' => '256781456492',
                'Cert_of_Inc' => null,
                'created_by' => 1,
            ]
            ];

        foreach ($fpos as $fpo) {
            \App\Models\FPO::create($fpo);
        }

    }
}
