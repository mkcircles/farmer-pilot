<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Api;
use App\Models\FarmerProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use function PHPSTORM_META\type;

/**
 * @group Farmer Profile
 * 
 * APIs for managing farmer profile
 */
class FarmerProfileController extends Controller
{

    /**
     * Register Farmer
     * 
     * This endpoint allows a user to register a farmer
     * @authenticated
     * 
     * @header Authorization required The authorization token. Example: Bearer {token}
     * 
     * @bodyParam first_name string required The first name of the farmer. Example: John
     * @bodyParam last_name string required The last name of the farmer. Example: Doe
     * @bodyParam dob date required The date of birth of the farmer. Example: 1990-01-01
     * @bodyParam gender string Farmer gender. Example Male/Female
     * @bodyParam education_level string required The education level of the farmer. Example: Primary
     * @bodyParam phone_number string required The phone number of the farmer. Example: 0789123456
     * @bodyParam id_number string required The national ID number of the farmer. Example: CM12345678
     * @bodyParam marital_status string required The marital status of the farmer. Example: Married
     * @bodyParam district string required The district of the farmer. Example: Kampala
     * @bodyParam county string required The county of the farmer. Example: Makindye
     * @bodyParam sub_county string required The sub county of the farmer. Example: Kibuye
     * @bodyParam parish string required The parish of the farmer. Example: Kibuye
     * @bodyParam village string required The village of the farmer. Example: Kibuye
     * @bodyParam fpo_id integer required The FPO name of the farmer. Example: Kibuye Farmers Union
     * @bodyParam farmer_cordinates string required The farmer cordinates of the farmer. Example: 0.0000,0.0000
     * @bodyParam next_of_kin string required The next of kin of the farmer. Example: Jane Doe
     * @bodyParam next_of_kin_contact string required The next of kin contact of the farmer. Example: 0789123456
     * @bodyParam next_of_kin_relationship string required The next of kin relationship of the farmer. Example: Wife
     * @bodyParam male_members_in_household integer required Number of male members of the household. Example: 2
     * @bodyParam female_members_in_household integer required Number of male members of the household. Example: 4
     * @bodyParam members_above_18 integer required Number of members above 18 years of age. Example: 4
     * @bodyParam children_below_5 integer required Number of children below 5 years of age. Example: 2
     * @bodyParam school_going_children integer required Number of school going children. Example: 2
     * @bodyParam head_of_family string required The head of family of the farmer. Example: John Doe
     * @bodyParam how_much_do_you_earn_from_agricultural_activities string required How much do you earn from agricultural activities. Example: 100000
     * @bodyParam how_much_do_you_earn_from_non_agricultural_activities string required How much do you earn from non agricultural activities. Example: 100000
     * @bodyParam do_you_have_an_account_with_an_FI string required Do you have an account with an FI. Example: Yes
     * @bodyParam farm_size string required The farm size of the farmer. Example: 2
     * @bodyParam farm_size_under_agriculture string required The farm size under agriculture of the farmer. Example: 2
     * @bodyParam land_ownership string required The land ownership of the farmer. Example: Owned
     * @bodyParam type_of_farming string required The type of farming of the farmer. Example: Crop
     * @bodyParam crops_grown string required The crops grown of the farmer. Example: Maize
     * @bodyParam animals_kept string required The animals kept of the farmer. Example: Cattle
     * @bodyParam estimated_produce_value_last_season string required The estimated produce value last season of the farmer. Example: 100000
     * @bodyParam estimated_produce_value_this_season string required The estimated produce value this season of the farmer. Example: 100000
     * @bodyParam data_captured_by string required The data captured by of the farmer. Example: 1
     * @bodyParam agent_id integer required The agent id of the farmer. Example: 1
     * 
     * @response {
     * "status": "success",
     * "message": "Farmer profile created successfully",
     * "data": {
     * "first_name": "John",
     * "last_name": "Doe",
     * "dob": "1981-05-06", 
     * 
     * }
     * }
     * 
     * @response 422 {
     * "status": "error",
     * "message": "Validation error",
     * "errors": {
     * }
     * }
     * 
     * @response 401 {
     * "status": "error",
     * "message": "Unauthorized"
     * }
     * 
     * @response 500 {
     * "status": "error",
     * "message": "Server error"
     * }
     * 
     * @response 403 {
     * "status": "error",
     * "message": "Forbidden"
     * }
     * 
     * @response 404 {
     * "status": "error",
     * "message": "Not found"
     * }
     * 
     * @response 400 {
     * "status": "error",
     * "message": "Bad request"
     * }
     * 
     * @response 405 {
     * "status": "error",
     * "message": "Method not allowed"
     * }
     * 
     * @response 429 {
     * "status": "error",
     * "message": "Too many requests"
     * }
     * 
     * 
     */

    public function registerFarmer(Request $request)
    {
      
    //   $validator = $request->validate([
    //     $request->first_name => 'required|string',
    //     $request->last_name => 'required|string',
    //     $request->dob => 'required|string',
    //     $request->gender => 'required|string',
    //     $request->education_level => 'required|string',
    //     $request->id_number => 'required|string|unique:farmer_profiles,id_number',
    //     $request->marital_status => 'required|string',
    //     $request->district => 'required|string',
    //     $request->county => 'required|string',
    //     $request->sub_county => 'required|string',
    //     $request->parish => 'required|string',
    //     $request->village => 'required|string',
    //     $request->fpo_id => 'required|integer',
    //     $request->farmer_cordinates => 'required|string',
    //     $request->next_of_kin => 'required|string',
    //     $request->next_of_kin_contact => 'required|string',
    //     $request->next_of_kin_relationship => 'required|string',
    //     $request->male_members_in_household => 'required|integer',
    //     $request->female_members_in_household => 'required|integer',
    //     $request->members_above_18 => 'required|integer',
    //     $request->children_below_5 => 'required|integer',
    //     $request->school_going_children => 'required|integer',
    //     $request->head_of_family => 'required|string',
    //     $request->how_much_do_you_earn_from_agricultural_activities => 'required',
    //     $request->how_much_do_you_earn_from_non_agricultural_activities => 'required',
    //     $request->do_you_have_an_account_with_an_FI => 'required',
    //     $request->farm_size => 'required|string',
    //     $request->farm_size_under_agriculture => 'required|string',
    //     $request->land_ownership => 'required|string',
    //     $request->type_of_farming => 'required|string',
    //     $request->crops_grown => 'required|string',
    //     $request->animals_kept => 'required|string',
    //     $request->estimated_produce_value_last_season => 'required|string',
    //     $request->estimated_produce_value_this_season => 'required|string',
    //     $request->agent_id => 'required|integer',
    //   ]);  
   
      // //Validate Request Data
        // $validate = $request->validate([
        //     $request->first_name => 'required|string',
        //     $request->last_name => 'required|string',
        //     $request->dob => 'required|string',
        //     $request->gender => 'required|string',
        //     $request->education_level => 'required|string',
        //     $request->id_number => 'required|string',
        //     $request->marital_status => 'required|string',
        //     $request->district => 'required|string',
        //     $request->county => 'required|string',
        //     $request->sub_county => 'required|string',
        //     $request->parish => 'required|string',
        //     $request->village => 'required|string',
        //     $request->fpo_id => 'required|integer',
        //     $request->farmer_cordinates => 'required|string',
        //     $request->next_of_kin => 'required|string',
        //     $request->next_of_kin_contact => 'required|string',
        //     $request->next_of_kin_relationship => 'required|string',
        //     $request->male_members_in_household => 'required|integer',
        //     $request->female_members_in_household => 'required|integer',
        //     $request->members_above_18 => 'required|integer',
        //     $request->children_below_5 => 'required|integer',
        //     $request->school_going_children => 'required|integer',
        //     $request->head_of_family => 'required|string',
        //     $request->how_much_do_you_earn_from_agricultural_activities => 'required',
        //     $request->how_much_do_you_earn_from_non_agricultural_activities => 'required',
        //     $request->do_you_have_an_account_with_an_FI => 'required',
        //     $request->farm_size => 'required|string',
        //     $request->farm_size_under_agriculture => 'required|string',
        //     $request->land_ownership => 'required|string',
        //     $request->type_of_farming => 'required|string',
        //     $request->crops_grown => 'required|string',
        //     $request->animals_kept => 'required|string',
        //     $request->estimated_produce_value_last_season => 'required|string',
        //     $request->estimated_produce_value_this_season => 'required|string',
        //     $request->agent_id => 'required|integer',
        // ]);

        // if($validate->fails()){
        //     return response()->json([
        //         'status' => 'error',
        //         'message' => 'Validation error',
        //         'errors' => $validate->errors()
        //     ], 422);
        // }
        
        //Save Data
        $farmer = new FarmerProfile();
        $farmer->farmer_id = $this->generateFarmerId();
        $farmer->first_name = $request->first_name;
        $farmer->last_name = $request->last_name;
        $farmer->dob = $request->dob;
        $farmer->gender = $request->gender;
        $farmer->education_level = $request->education_level;
        $farmer->phone_number = $request->phone_number;
        $farmer->id_number = $request->id_number;
        $farmer->marital_status = $request->marital_status;
        $farmer->district = $request->district;
        $farmer->county = $request->county;
        $farmer->sub_county = $request->sub_county;
        $farmer->parish = $request->parish;
        $farmer->village = $request->village;
        $farmer->fpo_id = $request->fpo_id;
        $farmer->farmer_cordinates = $request->farmer_cordinates;
        $farmer->next_of_kin = $request->next_of_kin;
        $farmer->next_of_kin_contact = $request->next_of_kin_contact;
        $farmer->next_of_kin_relationship = $request->next_of_kin_relationship;
        $farmer->male_members_in_household = $request->male_members_in_household;
        $farmer->female_members_in_household = $request->female_members_in_household;
        $farmer->members_above_18 = $request->members_above_18;
        $farmer->children_below_5 = $request->children_below_5;
        $farmer->school_going_children = $request->school_going_children;
        $farmer->head_of_family = $request->head_of_family;
        $farmer->how_much_do_you_earn_from_agricultural_activities = $request->how_much_do_you_earn_from_agricultural_activities;
        $farmer->how_much_do_you_earn_from_non_agricultural_activities = $request->how_much_do_you_earn_from_non_agricultural_activities;
        $farmer->do_you_have_an_account_with_an_FI = $request->do_you_have_an_account_with_an_FI;
        $farmer->farm_size = $request->farm_size;
        $farmer->farm_size_under_agriculture = $request->farm_size_under_agriculture;
        $farmer->land_ownership = $request->land_ownership;
        $farmer->type_of_farming = $request->type_of_farming;
        $farmer->crops_grown = $request->crops_grown;
        $farmer->animals_kept = $request->animals_kept;
        $farmer->estimated_produce_value_last_season = $request->estimated_produce_value_last_season;
        $farmer->estimated_produce_value_this_season = $request->estimated_produce_value_this_season;
        $farmer->rId = $request->rId;
        $farmer->consumerDeviceId = $request->consumerDeviceId;
        $farmer->data_captured_by = $request->data_captured_by;

        $farmer->save();

        //Return Response
        return response()->json([
            'status' => 'success',
            'message' => 'Farmer profile created successfully',
            'data' => $farmer
        ], 201);
    }

    private function generateFarmerId()
    {
        $farmerId = strtoupper(uniqid());
        if($this->farmerIdExists($farmerId)){
            $this->generateFarmerId();
        }
        return $farmerId;
    }

    private function farmerIdExists($farmerId)
    {
        return FarmerProfile::where('farmer_id', $farmerId)->exists();
    }


    //Get all farmers


   
}
