<?php

namespace Database\Seeders;

use App\Models\Agent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AgentSeeder extends Seeder
{
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
                'photo' => 'https://www.pngmart.com/files/22/User-Avatar-Profile-Transparent-Background.png',
                'created_by' => 1,
                'fpo_id' => 1,
            ],
        ];

        foreach ($agents as $agent) {
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
