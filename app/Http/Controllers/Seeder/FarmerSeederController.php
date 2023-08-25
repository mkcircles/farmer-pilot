<?php

namespace App\Http\Controllers\Seeder;

use App\Http\Controllers\Controller;
use App\Models\FarmerProfile;
use App\Models\UnffeOutreach;
use Illuminate\Http\Request;

class FarmerSeederController extends Controller
{

    public function importUnffeOutReach()
    {
        $file = public_path('imports/farmer-profile-10.json');
        $data = json_decode(file_get_contents($file), true);
        foreach ($data as $d){
            //dd($d);
            if($d['First Name'] != null || !empty($d['First Name']) || $d['First Name'] != "" || $d['First Name'] != " "){
                UnffeOutreach::create([
                    'first_name' => $d['First Name'],
                    'last_name' => $d['Last Name'],
                    'dob' => $d['DoB'],
                    'gender' => $d['Gender'],
                    'phone_number' => $d['Phone No'],
                    'id_number' => $d['ID Number'],
                    'district' => $d['District'],
                    'sub_county' => $d['Sub County'],
                    'parish' => $d['Parish'],
                    'village' => $d['Village'],
                    'fpo_name' => $d['FPO Name'],
                    'group_name' => $d['Group Name'],
                    'group_code' => $d['Group Code'],
                    'farm_size' => $d['Farm Size'],
                    'crops_grown' => $d['Crops grown'],
                ]);
            }

        }


    }
}
