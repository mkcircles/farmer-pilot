<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\District;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class LocationController extends Controller
{
    //
    public function importDistrictSeeder()
    {
        $contents = File::get(public_path('districts.json'));
        $json = json_decode($contents);

        foreach($json[0]->districts as $district){
            //Check if district exists
            $d = District::where('name', $district->name)->first();
            if($d){
                continue;
            }else{
                $d = new District();
                $d->name = $district->name;
                $d->region = $district->region;
                $d->size = $district->size;
                $d->size_units = $district->size_units;
                $d->townstatus = $district->townstatus=='true'?1:0;
                $d->save();
            }
            
        }
    }

    //Get Distinct Districts
    public function getDistricts(){
        
    }


}
