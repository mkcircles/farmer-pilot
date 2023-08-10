<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use App\Models\FarmerProfile;
use App\Models\User;
use Illuminate\Http\Request;
/**
 * @group FPO Data Management
 * 
 * APIs for FPOs using the dashboard
 */
class FPODataManagementController extends Controller
{
    /**
     * Get registered FPO Farmers
     * 
     * This endpoint allows to get registered farmers
     * @authenticated
     * 
     * @header Authorization required The authorization token. Example: Bearer {token}
     * 
     * @response {
     *      "status": "success",
     *      "message": "Search results",
     *      "data":
     *       "current_page": 1
     *     {
     *      "farmer_id": 1,
     *          "first_name": "John",
     *          "last_name": "Doe",
     *          "dob": "1981-05-06",
     *          "gender": "Male",
     *          "education_level": "High School",
     *          "phone_number": "1234567890",
     *          "id_number": "1234567890",
     *          "marital_status": "Single",
     *          "district": "1",
     *          "county": "1",
     *          "sub_county": "1",
     *          "parish": "1",
     *          "village": "1",
     *          "fpo_id": "1",
     *          "farmer_cordinates": "1",
     *          "next_of_kin": "1",
     *          "next_of_kin_contact": "1",
     *          "next_of_kin_relationship": "1",
     *          "male_members_in_household": "1",
     *          "female_members_in_household": "1",
     *          "members_above_18": "1",
     *          "children_below_5": "1",
     *          "school_going_children": "1",
     *          "head_of_family": "1",
     *          "how_much_do_you_earn_from_agricultural_activities": "1",
     *          "how_much_do_you_earn_from_non_agricultural_activities": "1",
     *          "do_you_have_an_account_with_an_FI": "1",
     *          "farm_size": "1",
     *          "farm_size_under_agriculture": "1",
     *          "land_ownership": "1",
     *          "type_of_farming": "1",
     *          "crops_grown": "1",
     *          "animals_kept": "1",
     *          "estimated_produce_value_last_season": "1",
     *          "estimated_produce_value_this_season": "1",
     *          "data_captured_by": "1",
     *          "agent_id": "1",
     *          "photo": "farmer.jpg"
     * },
     *      "total": 1
     *      "first_page_url": "http://127.0.0.1:8000?page=1",
     *     "from": 1,
     *     "last_page": 1,
     *     "last_page_url": "http://127.0.0.1:8000?page=1",
     *     "next_page_url": null,
     *     "path": "http://127.0.0.1:8000",
     *     "per_page": 10,
     *     "prev_page_url": null,
     *     "to": 1
     * }
     * 
     */
    public function getFPOFarmers(Request $request)
    {
        $user = $request->user();
        $farmers = FarmerProfile::orderBy('id', 'desc')
                    ->where('fpo_id',$user->entity_id)
                    ->paginate();
        return response()->json([
            'status'=>'success',
            'message'=>'FPO Farmers',
            'data' => $farmers
        ],200);
    }

    /**
     * Get registered FPO Users
     * 
     * This endpoint allows to get registered users
     * @authenticated
     * 
     * @header Authorization required The authorization token. Example: Bearer {token}
     * 
     * @response {
     *      "status": "success",
     *      "message": "Search results",
     *
     * response 200 {
     *     "status": "success",
     *     "data": [
     *      "current_page": 1,
     *         {
     *          "id": 1,
     *          "name": "Maurice Kamugisha",
     *          "email": "mF5uT@example.com",
     *          "phone_number": "256781456492",
     *          "role": "admin",
     *          "photo": "https://ui-avatars.com/api/?name=Maurice+Kamugisha&size=128",
     *          "created_at": "2022-01-01T00:00:00.000000Z",
     *          },
     *          {
     *          "id": 2,
     *          "name": "User 1",
     *          "email": "mF5uT@example.com",
     *          "phone_number": "256781456491",
     *          "role": "admin",
     *          "photo": "https://ui-avatars.com/api/?name=User+One&size=128",
     *          "created_at": "2022-01-01T00:00:00.000000Z",
     *          }
     *      ],
     *     "first_page_url": "http://127.0.0.1:8000?page=1",
     *     "from": 1,
     *     "last_page": 1,
     *     "last_page_url": "http://127.0.0.1:8000?page=1",
     *     "next_page_url": null,
     *     "path": "http://127.0.0.1:8000",
     *     "per_page": 10,
     *     "prev_page_url": null,
     *     "to": 1
     *     },
     *     "total": 2
     * }
     * 
     */
    public function getFPOUsers(Request $request)
    {
        $user = $request->user();
        $users = User::where('entity_type','FPO')
                ->where('entity_id',$user->entity_id)
                ->paginate();
        return response()->json([
            'status'=>'success',
            'message'=>'Search results',
            'data' => $users
        ],200);

    }

    /**
     * Get FPO agents
     * 
     * This endpoint allows a user to get all agents
     * @authenticated
     * 
     * @header Authorization required The authorization token. Example: Bearer {token}
     * 
     * @response {
     * "success": true,
     * "message": "Agents retrieved successfully",
     * "data": {
     * "current_page": 1,
     * "data": [
     * {
     * "id": 1,
     * "first_name": "John",
     * "last_name": "Doe",
     * "email": "",
     * "phone_number": "08012345678",
     * "age": "30",
     * "residence": "Kampala",
     * "referee_name": "Jane Doe",
     * "referee_phone_number": "08012345678",
     * "designation": "Agro Extension Worker",
     * "photo": null,
     * "created_at": "2021-06-27T14:56:12.000000Z",
     * "updated_at": "2021-06-27T14:56:12.000000Z"
     * }
     * ],
     * "first_page_url": "http://localhost:8000/api/fpo/agents?page=1",
     * "from": 1,
     * "last_page": 1,
     * "last_page_url": "http://localhost:8000/api/fpo/agents?page=1",
     * "links": [
     * {
     * "url": null,
     * "label": "&laquo; Previous",
     * "active": false
     * },
     * {
     * "url": "http://localhost:8000/api/fpo/agents?page=1",
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
     * "path": "http://localhost:8000/api/fpo/agents",
     * "per_page": 15,
     * "prev_page_url": null,
     * "to": 1,
     * "total": 1
     * }
     * }
     * @response 404 {
     * 
     * "success": false,
     * "message": "No agents found",
     * "data": null
     * }
     */
    public function getFPOAgents(Request $request)
    {
        $user = $request->user();
        $agents = Agent::where('fpo_id',$user->entity_id)->paginate();
        if(count($agents) == 0)
            return response()->json([
                'success' => false,
                'message' => 'No agents found',
                'data' => null
            ], 404);
        
        return response()->json([
            'success' => true,
            'message' => 'Agents retrieved successfully',
            'data' => $agents
        ], 200);
    }


}
