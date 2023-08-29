<?php

namespace App\Http\Controllers\Migration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DataMigrationController extends Controller
{
    public function getAgents(Request $request,$limit){
        //get API headers
        $headers = $request->headers->all();
        $token = $headers['basic'][0];

        if($token != env('API_TOKEN')){
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $agents = \App\Models\Agent::with('fpo')->paginate($limit);
        return response()->json($agents);
    }
    public function getLatestAgents(Request $request){
        //get API headers
        $headers = $request->headers->all();
        $token = $headers['basic'][0];

        if($token != env('API_TOKEN')){
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        //get agents that were recorded in the last 30 minutes
        $agents = \App\Models\Agent::with('fpo')->where('created_at', '>=', \Carbon\Carbon::now()->subMinutes(30))->get();
        return response()->json($agents);
    }
    public function getFarmers(Request $request,$limit){
        //get API headers
        $headers = $request->headers->all();
        $token = $headers['basic'][0];

        if($token != env('API_TOKEN')){
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $farmers = \App\Models\FarmerProfile::with('fpo')->paginate($limit);
        return response()->json($farmers);
    }

    public function getLatestFarmers(Request $request){
        //get API headers
        $headers = $request->headers->all();
        $token = $headers['basic'][0];

        if($token != env('API_TOKEN')){
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        //get farmers that were recorded in the last 30 minutes
        $farmers = \App\Models\FarmerProfile::with('fpo')->where('created_at', '>=', \Carbon\Carbon::now()->subMinutes(30))->get();
        return response()->json($farmers);
    }

    public function getUnffeOutreach(Request $request,$limit){
        //get API headers
        $headers = $request->headers->all();
        $token = $headers['basic'][0];

        if($token != env('API_TOKEN')){
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $farmers = \App\Models\UnffeOutreach::paginate($limit);
        return response()->json($farmers);
    }

}
