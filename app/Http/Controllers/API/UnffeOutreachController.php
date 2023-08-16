<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\UnffeOutreach;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

/**
 * @group UNFFE Outreach
 *
 * APIs for managing UNFFE Outreach
 */
class UnffeOutreachController extends Controller
{

    /**
     * Get all UNFFE Outreach
     * @authenticated
     *
     * @response {
     * "current_page": 1,
     * "data": [
     * {
     * "id": 1,
     * "first_name": "John",
     * "last_name": "Doe",
     * "dob": "2023/02/12",
     * "gender" : "Male",
     * "phone_number" : "0788888888",
     * "id_number" : "CM/123456",
     * "district" : "Kampala",
     * "sub_county" : "Kampala",
     * "parish" : "Kampala",
     * "village" : "Kampala",
     * "fpo_name" : "Kampala",
     * "group_name" : "Kampala",
     * "group_code" : "Kampala",
     * "farm_size" : "4",
     * "crops_grown" : "Matooke",
     * "created_at": "2023/02/12",
     * "updated_at": "2023/02/12"
     * }
     * ],
     * "first_page_url": "http://localhost:8000/api/unffe-outreach?page=1",
     * "from": 1,
     * "last_page": 1,
     * "last_page_url": "http://localhost:8000/api/unffe-outreach?page=1",
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
    public function getUnffeOutreach()
    {
        $data = UnffeOutreach::paginate();
        return response()->json([
            'success' => true,
            'message' => 'UNFFE Outreach retrieved successfully',
            'data' => $data
        ]);
    }

    /**
     * Register UNFFE Outreach
     * @authenticated
     *
     * @bodyParam first_name string required The first name of the UNFFE Outreach.
     * @bodyParam last_name string required The last name of the UNFFE Outreach.
     * @bodyParam dob date required The date of birth of the UNFFE Outreach.
     * @bodyParam gender string optional The gender of the UNFFE Outreach. Example: Male, Female
     * @bodyParam phone_number string required The phone number of the UNFFE Outreach.
     * @bodyParam id_number string required The ID number of the UNFFE Outreach.
     * @bodyParam district string required The district of the UNFFE Outreach.
     * @bodyParam sub_county string required The sub county of the UNFFE Outreach.
     * @bodyParam parish string required The parish of the UNFFE Outreach.
     * @bodyParam village string required The village of the UNFFE Outreach.
     * @bodyParam fpo_name string required The FPO name of the UNFFE Outreach.
     * @bodyParam group_name string required The group name of the UNFFE Outreach.
     * @bodyParam group_code string required The group code of the UNFFE Outreach.
     * @bodyParam farm_size string required The farm size of the UNFFE Outreach.
     * @bodyParam crops_grown string required The crops grown of the UNFFE Outreach.
     *
     * @response {
     * "success": true,
     * "message": "UNFFE Outreach registered successfully",
     * "data": {
     * "first_name": "John",
     * "last_name": "Doe",
     * "dob": "2023/02/12",
     * "gender" : "Male",
     * "phone_number" : "0788888888",
     * "id_number" : "CM/123456",
     * "district" : "Kampala",
     * "sub_county" : "Kampala",
     * "parish" : "Kampala",
     * "village" : "Kampala",
     * "fpo_name" : "Kampala",
     * "group_name" : "Kampala",
     * "group_code" : "Kampala",
     * "farm_size" : "4",
     * "crops_grown" : "Matooke",
     * "created_at": "2023/02/12",
     * "updated_at": "2023/02/12",
     * "id": 1
     * }
     *
     * @response 422 {
     * "success": false,
     * "message": "Validation Error",
     * "data": {
     * "first_name": [
     * "The first name field is required."
     * ],
     * "last_name": [
     * "The last name field is required."
     * ],
     * "dob": [
     * "The dob field is required."
     * ],
     *
     * "district": [
     * "The district field is required."
     * ],
     * }
     *
     *
     */
    public function registerUnffeOutreach(Request $request){
        $validate = Validator::make($request->all(),[
            'first_name' => 'required',
            'last_name' => 'required',
            'district' => 'required',
            'sub_county' => 'required',
            'parish' => 'required',
        ]);

        if ($validate->fails()){
            return response()->json([
                'success' => false,
                'message' => 'Validation Error',
                'data' => $validate->errors()
            ]);
        }

        $unffeOutreach = new UnffeOutreach();
        $unffeOutreach->first_name = $request->first_name;
        $unffeOutreach->last_name = $request->last_name;
        $unffeOutreach->dob = $request->dob;
        $unffeOutreach->gender = $request->gender;
        $unffeOutreach->phone_number = $request->phone_number;
        $unffeOutreach->id_number = $request->id_number;
        $unffeOutreach->district = $request->district;
        $unffeOutreach->sub_county = $request->sub_county;
        $unffeOutreach->parish = $request->parish;
        $unffeOutreach->village = $request->village;
        $unffeOutreach->fpo_name = $request->fpo_name;
        $unffeOutreach->group_name = $request->group_name;
        $unffeOutreach->group_code = $request->group_code;
        $unffeOutreach->farm_size = $request->farm_size;
        $unffeOutreach->crops_grown = $request->crops_grown;
        $unffeOutreach->save();

        return response()->json([
            'success' => true,
            'message' => 'UNFFE Outreach registered successfully',
            'data' => $unffeOutreach
        ]);
    }

    /**
     * Update UNFFE Outreach
     *
     * @authenticated
     *
     * @headerparam id required The id of the UNFFE Outreach.
     *
     * @bodyParam first_name string required The first name of the UNFFE Outreach.
     * @bodyParam last_name string required The last name of the UNFFE Outreach.
     * @bodyParam dob date required The date of birth of the UNFFE Outreach.
     * @bodyParam gender string optional The gender of the UNFFE Outreach. Example: Male, Female
     * @bodyParam phone_number string required The phone number of the UNFFE Outreach.
     * @bodyParam id_number string required The ID number of the UNFFE Outreach.
     * @bodyParam district string required The district of the UNFFE Outreach.
     * @bodyParam sub_county string required The sub county of the UNFFE Outreach.
     * @bodyParam parish string required The parish of the UNFFE Outreach.
     * @bodyParam village string required The village of the UNFFE Outreach.
     * @bodyParam fpo_name string required The FPO name of the UNFFE Outreach.
     * @bodyParam group_name string required The group name of the UNFFE Outreach.
     * @bodyParam group_code string required The group code of the UNFFE Outreach.
     * @bodyParam farm_size string required The farm size of the UNFFE Outreach.
     * @bodyParam crops_grown string required The crops grown of the UNFFE Outreach.
     *
     * @response {
     * "success": true,
     * "message": "UNFFE Outreach updated successfully",
     * "data": {
     * "first_name": "John",
     * "last_name": "Doe",
     * "dob": "2023/02/12",
     * "gender" : "Male",
     * "phone_number" : "0788888888",
     * "id_number" : "CM/123456",
     * "district" : "Kampala",
     * "sub_county" : "Kampala",
     * "parish" : "Kampala",
     * "village" : "Kampala",
     * "fpo_name" : "Kampala",
     * "group_name" : "Kampala",
     * "group_code" : "Kampala",
     * "farm_size" : "4",
     * "crops_grown" : "Matooke",
     * "created_at": "2023/02/12",
     * "updated_at": "2023/02/12",
     * "id": 1
     * }
     *
     * @response 404 {
     * "success": false,
     * "message": "UNFFE Outreach not found"
     * }
     *
     * @response 422 {
     * "success": false,
     * "message": "Validation Error",
     * "data": {
     * "first_name": [
     * "The first name field is required."
     * ],
     * }
     *
     */
    public function updateUnffeOutreach(Request $request, $id){
        $get = UnffeOutreach::find($id);
        if (!$get){
            return response()->json([
                'success' => false,
                'message' => 'UNFFE Outreach not found'
            ]);
        }

        $validate = Validator::make($request->all(),[
            'first_name' => 'required',
            'last_name' => 'required',
            'district' => 'required',
            'sub_county' => 'required',
            'parish' => 'required',
        ]);

        if ($validate->fails()){
            return response()->json([
                'success' => false,
                'message' => 'Validation Error',
                'data' => $validate->errors()
            ]);
        }

        $get->first_name = $request->first_name;
        $get->last_name = $request->last_name;
        $get->dob = $request->dob;
        $get->gender = $request->gender;
        $get->phone_number = $request->phone_number;
        $get->id_number = $request->id_number;
        $get->district = $request->district;
        $get->sub_county = $request->sub_county;
        $get->parish = $request->parish;
        $get->village = $request->village;
        $get->fpo_name = $request->fpo_name;
        $get->group_name = $request->group_name;
        $get->group_code = $request->group_code;
        $get->farm_size = $request->farm_size;
        $get->crops_grown = $request->crops_grown;
        $get->save();

        return response()->json([
            'success' => true,
            'message' => 'UNFFE Outreach updated successfully',
            'data' => $get
        ]);

    }

    /**
     * Delete UNFFE Outreach
     *
     * @authenticated
     *
     * @headerparam id required The id of the UNFFE Outreach.
     *
     * @response {
     * "success": true,
     * "message": "UNFFE Outreach deleted successfully"
     * }
     *
     * @response 404 {
     * "success": false,
     * "message": "UNFFE Outreach not found"
     * }
     *
     */
    public function deleteUnffeOutreach($id)
    {
        $get = UnffeOutreach::find($id);
        if (!$get) {
            return response()->json([
                'success' => false,
                'message' => 'UNFFE Outreach not found'
            ]);
        }

        $get->delete();

        return response()->json([
            'success' => true,
            'message' => 'UNFFE Outreach deleted successfully'
        ]);

    }

    /**
     * Search UNFFE Outreach
     * @authenticated
     *
     * @bodyParam search string required The search term of the UNFFE Outreach.
     *
     * @response {
     * "success": true,
     * "message": "UNFFE Outreach search results",
     * "data": [
     * "current_page": 1,
     * "data": [
     * "first_name": "John",
     * "last_name": "Doe",
     * "dob": "2023/02/12",
     * "gender" : "Male",
     * "phone_number" : "0788888888",
     * "id_number" : "CM/123456",
     * "district" : "Kampala",
     * "sub_county" : "Kampala",
     * "parish" : "Kampala",
     * "village" : "Kampala",
     * "fpo_name" : "Kampala",
     * "group_name" : "Kampala",
     * "group_code" : "Kampala",
     * "farm_size" : "4",
     * "crops_grown" : "Matooke",
     * "created_at": "2023/02/12",
     * "updated_at": "2023/02/12",
     * "id": 1
     * }
     *
     * @response 422 {
     * "success": false,
     * "message": "Validation Error",
     * "data": {
     * "first_name": [
     * "The first name field is required."
     * ],
     * "last_name": [
     * "The last name field is required."
     * ],
     * "dob": [
     * "The dob field is required."
     * ],
     *
     * "district": [
     * "The district field is required."
     * ],
     * }
     *
     */
    public function searchUnffeOutreach(Request $request){
        $validate = Validator::make($request->all(),[
            'search' => 'required',
        ]);

        if ($validate->fails()){
            return response()->json([
                'success' => false,
                'message' => 'Validation Error',
                'data' => $validate->errors()
            ]);
        }

        $search = $request->get('search');
        $unffeOutreach = DB::table('unffe_outreaches')->where('first_name', 'like', '%'.$search.'%')
            ->orWhere('last_name', 'like', '%'.$search.'%')
            ->orWhere('phone_number', 'like', '%'.$search.'%')
            ->orWhere('id_number', 'like', '%'.$search.'%')
            ->orWhere('district', 'like', '%'.$search.'%')
            ->orWhere('sub_county', 'like', '%'.$search.'%')
            ->orWhere('parish', 'like', '%'.$search.'%')
            ->orWhere('village', 'like', '%'.$search.'%')
            ->orWhere('fpo_name', 'like', '%'.$search.'%')
            ->orWhere('group_name', 'like', '%'.$search.'%')
            ->orWhere('group_code', 'like', '%'.$search.'%')
            ->orWhere('farm_size', 'like', '%'.$search.'%')
            ->orWhere('crops_grown', 'like', '%'.$search.'%')
            ->paginate();

        return response()->json([
            'success' => true,
            'message' => 'UNFFE Outreach search results',
            'data' => $unffeOutreach
        ]);
    }

}
