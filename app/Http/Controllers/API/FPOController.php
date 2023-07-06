<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Agent;
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
     * @header Authorization required The authorization token. Example: Bearer {token}
     * 
     * @response 200 {
     * "current_page": 1,
     * "data": [
     *  {
     * "id": 1,
     * "fpo_name": "Root FPO",
     * "district": "Kampala",
     * "county": "Kampala",
     * "sub_county": "Kampala",
     * "parish": "Kampala",
     * "village": "Kampala",
     * "fpo_cordinates": null,
     * "main_crop": "Maize",
     * "fpo_contact_name": "Maurice Kamugisha",
     * "contact_phone_number": "256781456492",
     * "contact_email": "maurice@innovationvillage.co.ug",
     * "core_staff_count": "10",
     * "core_staff_positions": "Chairman, Vice Chairman, Secretary, Treasurer, Accountant, Field Officer, Field Officer, Field Officer, Field Officer, Field Officer",
     * "registration_status": "Registered",
     * "fpo_membership_number": "495",
     * "fpo_female_membership": "295",
     * "fpo_male_youth": "120",
     * "fpo_female_youth": "175",
     * "fpo_field_agents": "10",
     * "Cert_of_Inc": null,
     * "created_by": 1,
     * "created_at": "2023-07-06T09:12:42.000000Z",
     * "updated_at": "2023-07-06T09:12:42.000000Z"
     * },
     * {
     * "id": 2,
     * "fpo_name": "Ankole farmers cooperative",
     * "district": "Sheema",
     * "county": null,
     * "sub_county": "Sheema",
     * "parish": "Sheema",
     * "village": "Sheema",
     * "fpo_cordinates": "0.3530341,32.6148231",
     * "main_crop": "coffee maize beans bananas vegetable soya_beans",
     * "fpo_contact_name": "Joseph wandera",
     * "contact_phone_number": "",
     * "contact_email": "",
     * "core_staff_count": "10",
     * "core_staff_positions": "",
     * "registration_status": "no",
     * "fpo_membership_number": "1000",
     * "fpo_male_membership": "600",
     * "fpo_female_membership": "400",
     * "fpo_male_youth": "",
     * "fpo_female_youth": "",
     * "fpo_field_agents": "20",
     * "Cert_of_Inc": null,
     * "created_by": 1,
     * "created_at": "2023-07-06T09:12:42.000000Z",
     * "updated_at": "2023-07-06T09:12:42.000000Z"
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
     * "message": "No FPOs found"
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
     * Store a newly created FPO.
     * 
     * This endpoint allows you to store a newly created FPO.
     * @authenticated
     * 
     * @header Authorization required The authorization token. Example: Bearer {token}
     * 
     * @bodyParam fpo_name string required The name of the FPO.
     * @bodyParam district string required The district of the FPO.
     * @bodyParam county string required The county of the FPO.
     * @bodyParam sub_county string required The sub county of the FPO.
     * @bodyParam parish string required The parish of the FPO.
     * @bodyParam village string required The village of the FPO.
     * @bodyParam main_crop string required The main crop of the FPO.
     * @bodyParam fpo_contact_name string required The contact name of the FPO.
     * @bodyParam contact_phone_number string required The contact phone number of the FPO.
     * @bodyParam contact_email string required The contact email of the FPO.
     * @bodyParam core_staff_count integer required The number of core staff of the FPO.
     * @bodyParam core_staff_positions string required The positions of the core staff of the FPO.
     * @bodyParam registration_status string required The registration status of the FPO.
     * @bodyParam fpo_membership_number string required The membership number of the FPO.
     * @bodyParam fpo_male_membership string required The male membership number of the FPO.
     * @bodyParam fpo_female_membership string required The female membership number of the FPO.
     * @bodyParam fpo_male_youth string required The male youth membership number of the FPO.
     * @bodyParam fpo_female_youth string required The female youth membership number of the FPO.
     * @bodyParam fpo_field_agents string required The number of field agents of the FPO.
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
     * "fpo_contact_name": "FPO 1 contact name",
     * "contact_phone_number": "FPO 1 contact phone number",
     * "contact_email": "FPO 1 contact email",
     * "core_staff_count": 1,
     * "core_staff_positions": "FPO 1 core staff positions",
     * "registration_status": "FPO 1 registration status",
     * "fpo_membership_number": "FPO 1 membership number",
     * "fpo_male_membership": "600",
     * "fpo_female_membership": "400",
     * "fpo_male_youth": "",
     * "fpo_female_youth": "",
     * "fpo_field_agents": "20",
     * "Cert_of_Inc": null,
     * "created_by": 1,
     * "created_at": "2023-07-06T09:12:42.000000Z",
     * "updated_at": "2023-07-06T09:12:42.000000Z"
     * }
     * }
     * 
     * 
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
     * "fpo_contact_name": [
     * "The fpo contact name field is required."
     * ],
     * "contact_phone_number": [
     * "The contact phone number field is required."
     * ],
     * "contact_email": [
     * "The contact email field is required."
     * ],
     * "core_staff_count": [
     * "The core staff count field is required."
     * ],
     * "core_staff_positions": [
     * "The core staff positions field is required."
     * ],
     * "registration_status": [
     * "The registration status field is required."
     * ],
     * "fpo_membership_number": [
     * "The fpo membership number field is required."
     * ],
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
            'fpo_contact_name' => 'required|string',
            'contact_phone_number' => 'required|string',
            'contact_email' => 'required|string',
            'core_staff_count' => 'required|integer',
            'core_staff_positions' => 'required|string',
            'registration_status' => 'required|string',
            "fpo_membership_number" => "required|string",
            "fpo_male_membership" => "required|string",
            "fpo_female_membership" => "required|string",
            "fpo_male_youth" => "required|string",
            "fpo_female_youth" => "required|string",
            "fpo_field_agents" => "required|string",
            "created_by" => "required|integer",
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
     * @header Authorization required The authorization token. Example: Bearer {token}
     * 
     * @urlParam id string required The id of the FPO.
     * 
     * @response 200 {
     * "success": true,
     * "message": "FPO retrieved successfully",
     *  {
     * "id": 1,
     * "fpo_name": "Root FPO",
     * "district": "Kampala",
     * "county": "Kampala",
     * "sub_county": "Kampala",
     * "parish": "Kampala",
     * "village": "Kampala",
     * "fpo_cordinates": null,
     * "main_crop": "Maize",
     * "fpo_contact_name": "Maurice Kamugisha",
     * "contact_phone_number": "256781456492",
     * "contact_email": "maurice@innovationvillage.co.ug",
     * "core_staff_count": "10",
     * "core_staff_positions": "Chairman, Vice Chairman, Secretary, Treasurer, Accountant, Field Officer,r",
     * "registration_status": "Registered",
     * "fpo_membership_number": "495",
     * "fpo_female_membership": "295",
     * "fpo_male_youth": "120",
     * "fpo_female_youth": "175",
     * "fpo_field_agents": "10",
     * "Cert_of_Inc": null,
     * "created_by": 1,
     * "created_at": "2023-07-06T09:12:42.000000Z",
     * "updated_at": "2023-07-06T09:12:42.000000Z"
     * }
     * }
     * 
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
     * @header Authorization required The authorization token. Example: Bearer {token}
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
     * @bodyParam fpo_contact_name string required The contact name of the FPO.
     * @bodyParam contact_phone_number string required The contact phone number of the FPO.
     * @bodyParam contact_email string required The contact email of the FPO.
     * @bodyParam core_staff_count integer required The number of core staff of the FPO.
     * @bodyParam core_staff_positions string required The positions of the core staff of the FPO.
     * @bodyParam registration_status string required The registration status of the FPO.
     * @bodyParam fpo_membership_number string required The membership number of the FPO.
     * @bodyParam fpo_male_membership string required The male membership number of the FPO.
     * @bodyParam fpo_female_membership string required The female membership number of the FPO.
     * @bodyParam fpo_male_youth string required The male youth membership number of the FPO.
     * @bodyParam fpo_female_youth string required The female youth membership number of the FPO.
     * @bodyParam fpo_field_agents string required The number of field agents of the FPO.
     * 
     * @response 200 {
     * "success": true,
     * "message": "FPO updated successfully",
     * "data": {
     * "id": 1,
     * "fpo_name": "Root FPO",
     * "district": "Kampala",
     * "county": "Kampala",
     * "sub_county": "Kampala",
     * "parish": "Kampala",
     * "village": "Kampala",
     * "fpo_cordinates": null,
     * "main_crop": "Maize",
     * "fpo_contact_name": "Maurice Kamugisha",
     * "contact_phone_number": "256781456492",
     * "contact_email": "maurice@innovationvillage.co.ug",
     * "core_staff_count": "10",
     * "core_staff_positions": "Chairman, Vice Chairman, Secretary, Treasurer, Accountant, Field Officer,r",
     * "registration_status": "Registered",
     * "fpo_membership_number": "495",
     * "fpo_female_membership": "295",
     * "fpo_male_youth": "120",
     * "fpo_female_youth": "175",
     * "fpo_field_agents": "10",
     * "Cert_of_Inc": null,
     * "created_by": 1,
     * "created_at": "2023-07-06T09:12:42.000000Z",
     * "updated_at": "2023-07-06T09:12:42.000000Z"
     * }
     * }
     * 
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
            'fpo_contact_name' => 'required|string',
            'contact_phone_number' => 'required|string',
            'contact_email' => 'required|string',
            'core_staff_count' => 'required|integer',
            'core_staff_positions' => 'required|string',
            'registration_status' => 'required|string',
            "fpo_membership_number" => "required|string",
            "fpo_male_membership" => "required|string",
            "fpo_female_membership" => "required|string",
            "fpo_male_youth" => "required|string",
            "fpo_female_youth" => "required|string",
            "fpo_field_agents" => "required|string",
            "created_by" => "required|integer",
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
    * @header Authorization required The authorization token. Example: Bearer {token}
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

    /**
     * Get FPOs summary.
     * 
     * This endpoint allows you to fetch a summary of all FPOs.
     * @authenticated
     * 
     * @response 200 {
     * "success": true,
     * "message": "FPOs retrieved successfully",
     * "data": [
     * {
     * "id": 1,
     * "fpo_name": "FPO 1"
     * },
     * {
     * "id": 2,
     * "fpo_name": "FPO 2"
     * }
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
     * "message": "No FPOs found"
     * }
     * 
     * 
     */
    public function getFPOsSummary()
    {
        $fpos = FPO::all('id', 'fpo_name');
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
     * Get FPOs Agents.
     * 
     * This endpoint allows you to fetch all agents of a FPO.
     * @authenticated
     * 
     * @header Authorization required The authorization token. Example: Bearer {token}
     * 
     * @urlParam id string required The id of the FPO.
     * 
     * @response 200 {
     * "current_page": 1,
     * "data": [
     * {
     * "id": 1,
     * "first_name": "John",
     * "last_name": "Doe",
     * "phone_number": "256700000000",
     * "fpo_id": 1,
     * "created_at": "2021-06-30T11:30:00.000000Z",
     * "updated_at": "2021-06-30T11:30:00.000000Z"
     * },
     * {
     * "id": 2,
     * "first_name": "Jane",
     * "last_name": "Doe",
     * "phone_number": "256700000000",
     * "fpo_id": 1,
     * "created_at": "2021-06-30T11:30:00.000000Z",
     * "updated_at": "2021-06-30T11:30:00.000000Z"
     * }
     * ],
     * "first_page_url": "http://localhost:8000/api/fpos/1/agents?page=1",
     * "from": 1,
     * "last_page": 1,
     * "last_page_url": "http://localhost:8000/api/fpos/1/agents?page=1",
     * "links": [
     * {
     * "url": null,
     * "label": "&laquo; Previous",
     * "active": false
     * },
     * {
     * "url": "http://localhost:8000/api/fpos/1/agents?page=1",
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
     * "path": "http://localhost:8000/api/fpos/1/agents",
     * "per_page": 15,
     * "prev_page_url": null,
     * "to": 2,
     * "total": 2
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
     * "message": "No agents found"
     * }
     * 
     */
    public function getFPOAgents(string $id)
    {
        $agents = Agent::where('fpo_id', $id)->paginate();
        if($agents->isEmpty()){
            return response()->json([
                'success' => false,
                'message' => 'No agents found',
                'data' => null
            ], 404);
        }
        return response()->json([
            'success' => true,
            'message' => 'Agents retrieved successfully',
            'data' => $agents
        ], 200);
    }
}
