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
                'fpo_contact_name' => 'Maurice Kamugisha',
                'contact_phone_number' => '256781456492',
                'contact_email' => 'maurice@innovationvillage.co.ug',
                'core_staff_count' => 10,
                'core_staff_positions' => 'Chairman, Vice Chairman, Secretary, Treasurer, Accountant, Field Officer, Field Officer, Field Officer, Field Officer, Field Officer',
                'registration_status' => 'Registered',
                'fpo_membership_number' => '495',
                'fpo_male_membership' => '200',
                'fpo_female_membership' => '295',
                'fpo_male_youth' => '120',
                'fpo_female_youth' => '175',
                'fpo_field_agents' => '10',
                'Cert_of_Inc' => null,
                'created_by' => 1,
            ]
            ];

        foreach ($fpos as $fpo) {
            \App\Models\FPO::create($fpo);
        }

    }
}
