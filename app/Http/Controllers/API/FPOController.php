<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\FPO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
* @group FPO management
* 
* APIs for managing FPOs
*/
class FPOController extends Controller
{
    /**
     * Get all FPOs.
     * 
     * This endpoint allows you to fetch all FPOs.
     * @authenticated
     * 
     * @response 200 {
     * "current_page": 1,
     * "data": [
     * {
     * "id": 1,
     * "fpo_name": "FPO 1",
     * "district": "FPO 1 district",
     * "county": "FPO 1 county",
     * "sub_county": "FPO 1 sub county",
     * "parish": "FPO 1 parish",
     * "village": "FPO 1 village",
     * "main_crop": "FPO 1 main crop",
     * "fpo_member_count": 1,
     * "fpo_contact_name": "FPO 1 contact name",
     * "contact_phone_number": "FPO 1 contact phone number",
     * "Cert_of_Inc": "FPO 1 cert of inc",
     * "address": "FPO 1 address",
     * "created_at": "2021-06-30T11:30:00.000000Z",
     * "updated_at": "2021-06-30T11:30:00.000000Z"
     * },
     * {
     * "id": 2,
     * "fpo_name": "FPO 2",
     * "district": "FPO 2 district",
     * "county": "FPO 2 county",
     * "sub_county": "FPO 2 sub county",
     * "parish": "FPO 2 parish",
     * "village": "FPO 2 village",
     * "main_crop": "FPO 2 main crop",
     * "fpo_member_count": 2,
     * "fpo_contact_name": "FPO 2 contact name",
     * "contact_phone_number": "FPO 2 contact phone number",
     * "Cert_of_Inc": "FPO 2 cert of inc",
     * "address": "FPO 2 address",
     * "created_at": "2021-06-30T11:30:00.000000Z",
     * "updated_at": "2021-06-30T11:30:00.000000Z"
     * }
     * ],
     * "first_page_url": "http://localhost:8000/api/fpos?page=1",
     * "from": 1,
     * "last_page": 1,
     * "last_page_url": "http://localhost:8000/api/fpos?page=1",
     * "links": [
     * {
     * "url": null,
     * "label": "&laquo; Previous",
     * "active": false
     * },
     * {
     * "url": "http://localhost:8000/api/fpos?page=1",
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
     * "path": "http://localhost:8000/api/fpos",
     * "per_page": 15,
     * "prev_page_url": null,
     * "to": 2,
     * "total": 2
     * }
     * 
     * @response 401 {
     * "message": "Unauthenticated."
     * }
     * 
     * @response 403 {
     * "message": "This action is unauthorized."
     * }
     * 
     * @response 404 {
     * "message": "No query results for FPOs."
     * }
     * 
     */
    public function index()
    {
        $fpos = FPO::paginate();
        if($fpos->isEmpty()){
            return response()->json([
                'success' => false,
                'message' => 'No FPOs found',
                'data' => null
            ], 404);
        }
        return response()->json([
            'success' => true,
            'message' => 'FPOs retrieved successfully',
            'data' => $fpos
        ], 200);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Create FPO.
     * 
     * This endpoint allows you to create a new FPO.
     * @authenticated
     * 
     * @bodyParam fpo_name string required The name of the FPO.
     * @bodyParam district string required The district of the FPO.
     * @bodyParam county string required The county of the FPO.
     * @bodyParam sub_county string required The sub county of the FPO.
     * @bodyParam parish string required The parish of the FPO.
     * @bodyParam village string required The village of the FPO.
     * @bodyParam main_crop string required The main crop of the FPO.
     * @bodyParam fpo_member_count integer required The number of FPO members.
     * @bodyParam fpo_contact_name string required The contact name of the FPO.
     * @bodyParam contact_phone_number string required The contact phone number of the FPO.
     * @bodyParam created_by integer required The userId  of the FPO creator.
     * 
     * @response 201 {
     * "success": true,
     * "message": "FPO created successfully",
     * "data": {
     * "fpo_name": "FPO 1",
     * "district": "FPO 1 district",
     * "county": "FPO 1 county",
     * "sub_county": "FPO 1 sub county",
     * "parish": "FPO 1 parish",
     * "village": "FPO 1 village",
     * "main_crop": "FPO 1 main crop",
     * "fpo_member_count": 1,
     * "fpo_contact_name": "FPO 1 contact name",
     * "contact_phone_number": "FPO 1 contact phone number",
     * "Cert_of_Inc": null,
     * "created_by": 1,
     * "updated_at": "2021-06-30T11:30:00.000000Z",
     * "created_at": "2021-06-30T11:30:00.000000Z",
     * "id": 1
     * }
     * }
     * 
     * @response 400 {
     * "success": false,
     * "message": "Validation error",
     * "data": {
     * "fpo_name": [
     * "The fpo name field is required."
     * ],
     * "district": [
     * "The district field is required."
     * ],
     * "county": [
     * "The county field is required."
     * ],
     * "sub_county": [
     * "The sub county field is required."
     * ],
     * "parish": [
     * "The parish field is required."
     * ],
     * "village": [
     * "The village field is required."
     * ],
     * "main_crop": [
     * "The main crop field is required."
     * ],
     * "fpo_member_count": [
     * "The fpo member count field is required."
     * ],
     * "fpo_contact_name": [
     * "The fpo contact name field is required."
     * ],
     * "contact_phone_number": [
     * "The contact phone number field is required."
     * ],
     * "created_by": [
     * "The created by field is required."
     * ]
     * }
     * 
     * @response 401 {
     * "message": "Unauthenticated."
     *  }
     * @response 403 {
     * "message": "This action is unauthorized."
     * }
     * 
     * @response 404 {
     * "message": "No query results for FPOs."
     * }
     * 
     */
    
    public function store(Request $request)
    {
        $validated = Validator::make($request->all(),[
            'fpo_name' => 'required|string',
            'district' => 'required|string',
            'county' => 'required|string',
            'sub_county' => 'required|string',
            'parish' => 'required|string',
            'village' => 'required|string',
            'main_crop' => 'required|string',
            'fpo_member_count' => 'required|integer',
            'fpo_contact_name' => 'required|string',
            'contact_phone_number' => 'required|string',
            'address' => 'required|string',
        ]);

        if($validated->fails()){
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'data' => $validated->errors()
            ], 400);
        }

        $fpo = FPO::create($validated->validated());

        return response()->json([
            'success' => true,
            'message' => 'FPO created successfully',
            'data' => $fpo
        ], 201);
    }

    /**
     * Get FPO by id.
     * 
     * This endpoint allows you to fetch a FPO by id.
     * @authenticated
     * 
     * @urlParam id string required The id of the FPO.
     * 
     * @response 200 {
     * "success": true,
     * "message": "FPO retrieved successfully",
     * "data": {
     * "id": 1,
     * "fpo_name": "FPO 1",
     * "district": "FPO 1 district",
     * "county": "FPO 1 county",
     * "sub_county": "FPO 1 sub county",
     * "parish": "FPO 1 parish",
     * "village": "FPO 1 village",
     * "main_crop": "FPO 1 main crop",
     * "fpo_member_count": 1,
     * "fpo_contact_name": "FPO 1 contact name",
     * "contact_phone_number": "FPO 1 contact phone number",
     * "Cert_of_Inc": "FPO 1 cert of inc",
     * "address": "FPO 1 address",
     * "created_at": "2021-06-30T11:30:00.000000Z",
     * "updated_at": "2021-06-30T11:30:00.000000Z"
     * }
     * }
     * 
     * @response 401 {
     * "message": "Unauthenticated."
     * }
     * 
     * @response 403 {
     * "message": "This action is unauthorized."
     * }
     * 
     * @response 404 {
     * "message": "FPO not found"
     * }
     * 
     */
    public function show(string $id)
    {
        //Get FPO by id
        $fpo = FPO::find($id);
        if(!$fpo){
            return response()->json([
                'success' => false,
                'message' => 'FPO not found',
                'data' => null
            ], 404);
        }
        return response()->json([
            'success' => true,
            'message' => 'FPO retrieved successfully',
            'data' => $fpo
        ], 200);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update FPO by id.
     * 
     * This endpoint allows you to update a FPO by id.
     * @authenticated
     * 
     * @urlParam id string required The id of the FPO.
     * 
     * @bodyParam fpo_name string required The name of the FPO.
     * @bodyParam district string required The district of the FPO.
     * @bodyParam county string required The county of the FPO.
     * @bodyParam sub_county string required The sub county of the FPO.
     * @bodyParam parish string required The parish of the FPO.
     * @bodyParam village string required The village of the FPO.
     * @bodyParam main_crop string required The main crop of the FPO.
     * @bodyParam fpo_member_count integer required The number of FPO members.
     * @bodyParam fpo_contact_name string required The contact name of the FPO.
     * @bodyParam contact_phone_number string required The contact phone number of the FPO.
     * @bodyParam created_by integer required The userId  of the FPO creator.
     * 
     * @response 200 {
     * "success": true,
     * "message": "FPO updated successfully",
     * "data": {
     * "id": 1,
     * "fpo_name": "FPO 1",
     * "district": "FPO 1 district",
     * "county": "FPO 1 county",
     * "sub_county": "FPO 1 sub county",
     * "parish": "FPO 1 parish",
     * "village": "FPO 1 village",
     * "main_crop": "FPO 1 main crop",
     * "fpo_member_count": 1,
     * "fpo_contact_name": "FPO 1 contact name",
     * "contact_phone_number": "FPO 1 contact phone number",
     * "Cert_of_Inc": "FPO 1 cert of inc",
     * "address": "FPO 1 address",
     * "created_at": "2021-06-30T11:30:00.000000Z",
     * "updated_at": "2021-06-30T11:30:00.000000Z"
     * }
     * }
     * 
     * @response 400 {
     * "success": false,
     * "message": "Validation error",
     * "data": {
     * "fpo_name": [
     * "The fpo name field is required."
     * ],
     * "district": [
     * "The district field is required."
     * ],
     * "county": [
     * "The county field is required."
     * ],
     * "sub_county": [
     * "The sub county field is required."
     * ],
     * "parish": [
     * "The parish field is required."
     * ],
     * "village": [
     * "The village field is required."
     * ],
     * "main_crop": [
     * "The main crop field is required."
     * ],
     * "fpo_member_count": [
     *  "The fpo member count field is required."
     * ],
     * "fpo_contact_name": [
     * "The fpo contact name field is required."
     * ],
     * "contact_phone_number": [
     * "The contact phone number field is required."
     * ],
     * "created_by": [
     * "The created by field is required."
     * ]
     * }
     * 
     * @response 401 {
     * "message": "Unauthenticated."
     * }
     * 
     * @response 403 {
     * "message": "This action is unauthorized."
     * }
     * 
     * @response 404 {
     * "message": "FPO not found"
     * }
     * 
     * 
     */
    public function update(Request $request, string $id)
    {
        //Update FPO by id
        $fpo = FPO::find($id);
        if(!$fpo){
            return response()->json([
                'success' => false,
                'message' => 'FPO not found',
                'data' => null
            ], 404);
        }

        $validated = Validator::make($request->all(),[
            'fpo_name' => 'required|string',
            'district' => 'required|string',
            'county' => 'required|string',
            'sub_county' => 'required|string',
            'parish' => 'required|string',
            'village' => 'required|string',
            'main_crop' => 'required|string',
            'fpo_member_count' => 'required|integer',
            'fpo_contact_name' => 'required|string',
            'contact_phone_number' => 'required|string',
            'created_by' => 'required|integer',
        ]);

        if($validated->fails()){
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'data' => $validated->errors()
            ], 400);
        }

        $fpo->update($validated->validated());

        return response()->json([
            'success' => true,
            'message' => 'FPO updated successfully',
            'data' => $fpo
        ], 200);

    }

   /**
    * Remove FPO by id.
    *
    * This endpoint allows you to remove a FPO by id.
    * @authenticated
    *
    * @urlParam id string required The id of the FPO.
    *
    * @response 200 { 
    * "success": true,
    * "message": "FPO deleted successfully",
    * "data": {
    * "id": 1,
    * "fpo_name": "FPO 1",
    * "district": "FPO 1 district",
    * "county": "FPO 1 county",
    * "sub_county": "FPO 1 sub county",
    * "parish": "FPO 1 parish",
    * "village": "FPO 1 village",
    * "main_crop": "FPO 1 main crop",
    * "fpo_member_count": 1,
    * "fpo_contact_name": "FPO 1 contact name",
    * "contact_phone_number": "FPO 1 contact phone number",
    * "Cert_of_Inc": "FPO 1 cert of inc",
    * "address": "FPO 1 address",
    * "created_at": "2021-06-30T11:30:00.000000Z",
    * "updated_at": "2021-06-30T11:30:00.000000Z"
    * }
    * }
    *
    * @response 401 {
    * "message": "Unauthenticated."
    * }
    *
    * @response 403 {
    * "message": "This action is unauthorized."
    * }
    *
    * @response 404 {
    * "message": "FPO not found"
    * }
    *
    */
    public function destroy(string $id)
    {
        //Delete FPO by id
        $fpo = FPO::find($id);
        if(!$fpo){
            return response()->json([
                'success' => false,
                'message' => 'FPO not found',
                'data' => null
            ], 404);
        }
        $fpo->delete();
        return response()->json([
            'success' => true,
            'message' => 'FPO deleted successfully',
            'data' => $fpo
        ], 200);
    }
}
