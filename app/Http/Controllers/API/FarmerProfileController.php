<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Api;
use App\Models\FarmerProfile;
use App\Traits\HelperTraits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx\Rels;

/**
 * @group Farmer Profile
 * 
 * APIs for managing farmer profile
 */
class FarmerProfileController extends Controller
{

    use HelperTraits;

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
      
      $validator = Validator::make($request->all(), [
        'first_name' => 'required|string',
        'last_name' => 'required|string',
        'dob' => 'required|string',
        'gender' => 'required|string',
        'education_level' => 'required|string',
       // 'id_number' => 'required|string|unique:farmer_profiles,id_number',
        'marital_status' => 'required|string',
        'district' => 'required|string',
        'county' => 'required|string',
        'sub_county' => 'required|string',
        'parish' => 'required|string',
        'village' => 'required|string',
        'fpo_id' => 'required|integer',
        'farmer_cordinates' => 'required|string',
        //'next_of_kin' => 'required|string',
        //'next_of_kin_contact' => 'required|string',
        //'next_of_kin_relationship' => 'required|string',
        'male_members_in_household' => 'required|integer',
        'female_members_in_household' => 'required|integer',
        'members_above_18' => 'required|integer',
        'children_below_5' => 'required|integer',
        'school_going_children' => 'required|integer',
        'head_of_family' => 'required|string',
        'how_much_do_you_earn_from_agricultural_activities' => 'required',
        'how_much_do_you_earn_from_non_agricultural_activities' => 'required',
        'do_you_have_an_account_with_an_FI' => 'required',
        'farm_size' => 'required|string',
        'farm_size_under_agriculture' => 'required|string',
        'land_ownership' => 'required|string',
        'type_of_farming' => 'required|string',
        'crops_grown' => 'required|string',
        //'animals_kept' => 'required|string',
        'estimated_produce_value_last_season' => 'required|string',
        'estimated_produce_value_this_season' => 'required|string',
        'agent_id' => 'required|integer',
      ]);  
   
        if($validator->fails()){
            return response()->json([
                'status' => 'error',
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $check = FarmerProfile::where([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'dob' => $request->dob,
            'gender' => $request->gender,
            'education_level' => $request->education_level,
            'phone_number' => $request->phone_number,
            'id_number' => $request->id_number,
            'marital_status' => $request->marital_status,
            'district' => $request->district,
            'county' => $request->county,
            'sub_county' => $request->sub_county,
            'parish' => $request->parish,
            'village' => $request->village,
            'fpo_id' => $request->fpo_id,
        ])->first();
        if(!$check){
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
            $farmer->agent_id = $request->agent_id;
            //$farmer->photo = $imageName;

            $farmer->save();

            //Return Response
            return response()->json([
                'status' => 'success',
                'message' => 'Farmer profile created successfully',
                'data' => $farmer
            ], 201);
        }
        else{
            return response()->json([
                'status' => 'success',
                'message' => 'Farmer profile already exists',
                'data' => $check
            ], 200);
        }

    }

    /**
     * Create Farmer Photo
     * 
     * Add farmer photo
     * @authenticated
     * 
     * @bodyParam farmer_id integer required Farmer id
     * @bodyParam image string required Farmer photo
     * 
     * @response {
     *      "status": "success",
     *      "message": "Farmer photo created successfully",
     *      "data": {
     *          "farmer_id": 1,
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
     *          "rId": "1",
     *          "consumerDeviceId": "1",
     *          "data_captured_by": "1",
     *          "agent_id": "1",
     *          "photo": "farmer.jpg"
     *      }
     *    }
     * 
     * @response 422 {
     *      "status": "error",
     *      "message": "Validation error",
     *      "errors": {
     *          "farmer_id": ["Farmer id is required"],
     *          "image": ["Image is required"]
     *      }
     * }
     * 
     * @response 404 {
     *      "status": "error",
     *      "message": "Farmer profile not found",
     *      "errors": {
     *          "farmer_id": ["Farmer profile not found"]
     *      }
     * }
     * 
     */
    public function CreateFarmerPhoto(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'farmer_id' => 'required|string',
            'image' => 'required'
            ]);

            if($validate->fails()){
                return response()->json([
                    'status' => 'error',
                    'message' => 'Validation error',
                    'errors' => $validate->errors()
                ], 422);
            }

              //Check if request has image
              if ($request->image) {
                $folderPath = public_path() . '/farmers';
                $base64Image = explode(";base64,", $request->image);
                $explodeImage = explode("image/", $base64Image[0]);
                $imageType = $explodeImage[1];
                $image_base64 = base64_decode($base64Image[1]);
                $file = $folderPath . uniqid() . '. '.$imageType;
                file_put_contents($file, $image_base64);
            }else{
                $imageName = null;
            }

            $farmer = FarmerProfile::where('farmer_id', $request->farmer_id)->first();
            if(!$farmer){
                return response()->json([
                    'status' => 'error',
                    'message' => 'Farmer profile not found',
                    'errors' => [
                        'farmer_id' => ['Farmer profile not found']
                    ]
                ], 404);
            }

            $farmer->photo = $imageName;
            $farmer->save();   
            
            return response()->json([
                'status' => 'success',
                'message' => 'Farmer photo created successfully',
                'data' => $farmer
            ],200);
    }


    /**
     * Update Farmer Profile Status
     * 
     * Update farmer profile status
     * @authenticated
     * 
     * @bodyParam id integer required Farmer id
     * @bodyParam status string required Farmer profile status Example: pending,complete,valid,invalid,blacklisted,deceased
     * 
     * @response {
     *      "status": "success",
     *      "message": "Farmer profile status updated successfully",
     *      "data": {
     *          "farmer_id": 1,
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
     *          "rId": "1",
     *          "consumerDeviceId": "1",
     *          "data_captured_by": "1",
     *          "agent_id": "1",
     *          "photo": "farmer.jpg"
     *      }
     *    }
     * 
     * @response 422 {
     *      "status": "error",
     *      "message": "Validation error",
     *      "errors": {
     *          "farmer_id": ["Farmer id is required"],
     *          "status": ["Status is required"]
     *      }
     * }
     * 
     * @response 404 {
     *      "status": "error",
     *      "message": "Farmer profile not found",
     *      "errors": {
     *          "farmer_id": ["Farmer profile not found"]
     *      }
     *  }
     * 
     */
    public function updateFarmerProfileStatus(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'id' => 'required|string',
            'status' => 'required|string',
        ]);

        if($validate->fails()){
            return response()->json([
                'status' => 'error',
                'message' => 'Validation error',
                'errors' => $validate->errors()
            ], 422);
        }

        $farmer = FarmerProfile::where('farmer_id', $request->id)->first();
        $farmer->status = $request->status;
        $farmer->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Farmer profile status updated successfully',
            'data' => $farmer
        ],200);
    }
    

   
}
