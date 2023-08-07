<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\FarmerProfile;
use App\Models\FPO;
use App\Models\Agent;
use App\Models\MastercardProfileDetails;
use Illuminate\Http\Request;

/**
 * @group Data Management
 * 
 * APIs for managing farmer profile
 */
class DataController extends Controller
{

    /**
     * Get all farmers
     * 
     * This endpoint allows a user to get all farmers
     * @authenticated
     * 
     * @header Authorization required The authorization token. Example: Bearer {token}
     * 
     * @response {
     * "current_page": 1,
     * "data": [
     * {
     * "id": 1,
     * "first_name": "John",
     * "last_name": "Doe",
     * 
     * }
     * ],
     * "first_page_url": "http://localhost:8000/api/farmers?page=1",
     * "from": 1,
     * "last_page": 1,
     * "last_page_url": "http://localhost:8000/api/farmers?page=1",
     * "links": [
     * {
     * "url": null,
     * "label": "&laquo; Previous",
     * "active": false
     * },
     * {
     * "url": "http://localhost:8000/api/farmers?page=1",
     * "label": "1",
     * "active": true
     * },
     * {
     * "url": null,
     * "label": "Next &raquo;",
     * "active": false
     * }
     * ],
     * "next_page_url": null,
     * "path": "http://localhost:8000/api/farmers",
     * "per_page": 10,
     * "prev_page_url": null,
     * "to": 1,
     * "total": 1
     * }
     * 
     */
    public function getAllFarmers()
    {
        $farmers = FarmerProfile::orderBy('id', 'desc')->paginate();
        return response($farmers, 200);
    }

    /**
     * Get all farmers with biometrics
     * 
     * This endpoint allows a user to get all farmers with biometrics
     * @authenticated
     * 
     * @header Authorization required The authorization token. Example: Bearer {token}
     * 
     * @response {
     * "current_page": 1,
     * "data": [
     * {
     * 
     * }
     * ]
     * 
     * 
     * 
     }
     */
    public function getAllFarmerWithBiometrics()
    {
        $biometics = MastercardProfileDetails::with('farmerProfile')
                    ->where('entityType', 'FARMER')->orderBy('id', 'desc')->paginate();

        return response([
            'status' => 'success',
            'data' => $biometics
        ]);
        
    }

    /**
     * Get all farmers with failed biometric captures
     * 
     * This endpoint allows a user to get all farmers with failed biometric captures
     * @authenticated
     * 
     * @header Authorization required The authorization token. Example: Bearer {token}
     * 
     * @response {
     * "current_page": 1,
     * "data": [
     * {
     * 
     * }
     * ]
     * 
     * 
     * 
     }
     */
    public function getFailedBiometricCaptures()
    {
        $biometics = MastercardProfileDetails::with('farmerProfile')
                    ->where('entityType', 'FARMER')->whereNull('rID')->orderBy('id', 'desc')->paginate();

        return response([
            'status' => 'success',
            'data' => $biometics
        ]);
        
    }

    /**
     * Get all farmers with duplicate biometric captures
     * 
     * This endpoint allows a user to get all farmers with duplicate biometric captures
     * @authenticated
     * 
     * @header Authorization required The authorization token. Example: Bearer {token}
     * 
     * @response {
     * "current_page": 1,
     * "data": [
     * {
     * 
     * }
     * ]
     * 
     * 
     * 
     }
     */
    public function getDuplicateBiometricCaptures()
    {
        $biometics = MastercardProfileDetails::with('farmerProfile')
                    ->where('entityType', 'FARMER')->whereNotNull('possible_duplicate')->orderBy('id', 'desc')->paginate();

        return response([
            'status' => 'success',
            'data' => $biometics
        ]);
        
    }
    /**
     * Get farmer
     * 
     * This endpoint allows a user to get a farmer
     * @authenticated
     * 
     * @header Authorization required The authorization token. Example: Bearer {token}
     * 
     * @urlParam farmer_id required The Farmer unique ID . Example: FAR_0001
     * 
     * @response 200 {
     * "status": "success",
     * "message": "Farmer profile ",
     * "data": {
     * "id": 1,
     * "first_name": "John",
     * "last_name": "Doe",
     * ...
     * }
     * }
     * 
     * @response 404 {
     * "message": "Farmer not found"
     * }
     * 
     * 
     */
    public function getFarmer($farmer_id)
    {
        $farmer = FarmerProfile::where('farmer_id', $farmer_id)->first();
        if (!$farmer) {
            return response()->json([
                'status' => 'error',
                'message' => 'Farmer not found'
            ], 404);
        }
        return response()->json([
            'status' => 'success',
            'message' => 'Farmer profile ',
            'data' => $farmer
        ],200);
    }

    /**
     * Search Data
     * 
     * This endpoint allows a user to search through FPOs, Agents and Farmers
     * @authenticated
     * 
     * @header Authorization required The authorization token. Example: Bearer {token}
     * 
     * @bodyParam search string required The FPO or Agent or Farmer name. Example: John
     * 
     * @response {
     * "fpos": [],
     * "agents": [],
     * "farmers": [],
     * 
     * }
     * 
     * 
     */
    public function search(Request $request)
    {
        $search = $request->search;
        $fpos = FPO::where('fpo_name', 'like', '%' . $search . '%')->limit(4)->get();
        $agents = Agent::where(function ($query) use ($search) {
            $query->where('first_name', 'like', "%$search%")
                ->orWhere('last_name', 'like', "%$search%")
                ->orWhere('phone_number', 'like', "%$search%")
                ->orWhere('agent_code', 'like', "%$search%");
        })
            ->limit(4)
            ->get();
        $farmers = FarmerProfile::where(function ($query) use ($search) {
            $query->where('first_name', 'like', "%$search%")
                ->orWhere('last_name', 'like', "%$search%")
                ->orWhere('phone_number', 'like', "%$search%")
                ->orWhere('farmer_id', 'like', "%$search%");
        })
            ->limit(4)
            ->get();

        return response()->json([
            'fpos' => $fpos,
            'agents' => $agents,
            'farmers' => $farmers,
        ]);

    }

    //Get Distinct Districts and number of farmers registered
    /**
     * Get Districts
     * 
     * Get Distinct Districts and number of farmers registered
     * @authenticated
     * 
     * @header Authorization required The authorization token. Example: Bearer {token}
     * 
     * @response {
     * "data":{
     * "Amuru": 281,
     * "Wakiso": 281,
     * }
     *
     */
    public function getDistricts()
    {
        $data = [];
        $districts = FarmerProfile::distinct('district')->get();
        foreach ($districts as $district) {
            $data[$district->district] = FarmerProfile::where('district', $district->district)->count();
        }
        return response()->json([
            'success'=>true,
            'data'=>$data
        ],200);
    }

    //Get Farmer registration by date
    /**
     * Get Farmer registration by date
     * 
     * Get Farmer registration by date
     * @authenticated
     * 
     * @header Authorization required The authorization token. Example: Bearer {token}
     * 
     * @response {
     * "data":{
     * "2022-06-01": 281,
     * "2022-06-02": 281,
     * }
     */
    public function countFarmersByDate()
    {
        $data = [];
        $counts = FarmerProfile::orderBy('created_at')->get()->groupBy(function($item) {
            return $item->created_at->format('Y-m-d');
        });
       foreach($counts as $key => $value){
            $day = $key;
            $totalCount = $value->count();
            $data[$day] = $totalCount;
        }

        return response()->json([
            'success'=>true,
            'data'=>$data
        ],200);
    }

    public function countFarmersByFPO()
    {
       $data = [];
       $fpos = FPO::all();
       foreach($fpos as $fpo){
           $totalCount = FarmerProfile::where('fpo_id', $fpo->id)->count();
           $data[$fpo->fpo_name] = $totalCount;
       }

       return response()->json([
           'success'=>true,
           'data'=>json_encode($data)
       ]);
    }


}