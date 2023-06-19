<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\FarmerProfile;
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
        $farmers = FarmerProfile::paginate(10)->toJson(JSON_PRETTY_PRINT);
        return response($farmers, 200);
    }

    /**
     * Get farmer
     * 
     * @urlParam id required The ID of the farmer. Example: 1
     * 
     * @response {
     * "id": 1,
     * "first_name": "John",
     * "last_name": "Doe",
     * ...
     * }
     * 
     * @response 404 {
     * "message": "Farmer not found"
     * }
     * 
     * 
     */
    public function getFarmer($id)
    {
        $farmer = FarmerProfile::where('id', $id)->first();
        if($farmer == null){
            return response(['message' => 'Farmer not found'], 404);
        }
        return response($farmer, 200);
    }
}