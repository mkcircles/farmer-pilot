<?php

namespace Database\Seeders;

use App\Models\Agent;
use App\Traits\HelperTraits;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AgentSeeder extends Seeder
{
    use HelperTraits;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $agents = [
            [
                'agent_code' => 'AGT001',
                'first_name' => 'Dominic',
                'last_name' => 'Wambugu',
                'email' => 'dwambugu@innovationvillage.co.ug',
                'phone_number' => '256774961072',
                'age' => 40,
                'gender' => 'male',
                'residence' => 'Kampala',
                'referee_name' => 'Maurice Kamugisha',
                'referee_phone_number' => '256781456492',
                'designation' => 'SDAN Manager',
                'created_by' => 1,
                'fpo_id' => 1,
            ],
            [
                'agent_code' => 'AGT002',
                'first_name' => 'Eric',
                'last_name' => 'Kalujja',
                'email' => 'ekalujja@innovationvillage.co.ug',
                'phone_number' => '256776017168',
                'age' => 26,
                'gender' => 'male',
                'residence' => 'Kampala',
                'referee_name' => 'Maurice Kamugisha',
                'referee_phone_number' => '256781456492',
                'designation' => 'Amuru Agent',
                'created_by' => 1,
                'fpo_id' => 2,
            ],
            [
                'agent_code' => 'AGT003',
                'first_name' => 'Duncan',
                'last_name' => 'Mudulo',
                'email' => 'dmudulo@innovationvillage.co.ug',
                'phone_number' => '256702681160',
                'age' => 28,
                'gender' => 'male',
                'residence' => 'Kampala',
                'referee_name' => 'Maurice Kamugisha',
                'referee_phone_number' => '256781456492',
                'designation' => 'Amuru Agent',
                'created_by' => 1,
                'fpo_id' => 2,
            ],
            [
                'agent_code' => 'AGT004',
                'first_name' => 'Saul',
                'last_name' => 'Kavuma',
                'email' => 'skavuma@innovationvillage.co.ug',
                'phone_number' => '256774961078',
                'age' => 40,
                'gender' => 'male',
                'residence' => 'Kampala',
                'referee_name' => 'Maurice Kamugisha',
                'referee_phone_number' => '256781456492',
                'designation' => 'Amuru Agent',
                'created_by' => 1,
                'fpo_id' => 2,
            ],
            [
                'agent_code' => 'AGT005',
                'first_name' => 'Adrian',
                'last_name' => 'Kagame',
                'email' => 'akagame@innovationvillage.co.ug',
                'phone_number' => '256774961908',
                'age' => 40,
                'gender' => 'male',
                'residence' => 'Kampala',
                'referee_name' => 'Maurice Kamugisha',
                'referee_phone_number' => '256781456492',
                'designation' => 'Amuru Agent',
                'created_by' => 1,
                'fpo_id' => 2,
            ],
        ];

        foreach ($agents as $agent) {
            $agent['photo'] = 'https://ui-avatars.com/api/?background=random&size=128&name='.$agent['first_name'].'+'.$agent['last_name'];

           $ag = \App\Models\Agent::create($agent);

           $user = new \App\Models\User();
           $user->name = $ag->first_name.' '.$ag->last_name;
           $user->email = $ag->email;
           $user->phone_number = $ag->phone_number;
           $user->password = Hash::make('password');
           $user->role = 'agent';
           $user->save();
        }
          
    }

    
}
