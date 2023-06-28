<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

/**
 * @group Agent management
 * 
 * APIs for managing agents
 */

class AgentController extends Controller
{
    /**
     * Get all agents
     * 
     * @authenticated
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
     * "first_page_url": "http://localhost:8000/api/agents?page=1",
     * "from": 1,
     * "last_page": 1,
     * "last_page_url": "http://localhost:8000/api/agents?page=1",
     * "links": [
     * {
     * "url": null,
     * "label": "&laquo; Previous",
     * "active": false
     * },
     * {
     * "url": "http://localhost:8000/api/agents?page=1",
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
     * "path": "http://localhost:8000/api/agents",
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
    
    public function index()
    {
        //Get all agents
        $agents = Agent::paginate();
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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Create a new agent
     * 
     * @authenticated
     * 
     * @bodyParam first_name string required The first name of the agent. Example: John
     * @bodyParam last_name string required The last name of the agent. Example: Doe
     * @bodyParam email string required The email of the agent. Example: 
     * @bodyParam phone_number string required The phone number of the agent. Example: 256XXXXXXXXX
     * @bodyParam age string required The age of the agent. Example: 30
     * @bodyParam residence string required The residence of the agent. Example: Kampala
     * @bodyParam referee_name string required The referee name of the agent. Example: Jane Doe
     * @bodyParam referee_phone_number string required The referee phone number of the agent. Example: 08012345678
     * @bodyParam designation string required The designation of the agent. Example: Agro Extension Worker
     * 
     * @response {
     * "success": true,
     * "message": "Agent created successfully",
     * "data": {
     * "first_name": "John",
     * "last_name": "Doe",
     * "email": "",
     * "phone_number": "256XXXXXXXXX",
     * "age": "30",
     * "residence": "Kampala",
     * "referee_name": "Jane Doe",
     * "referee_phone_number": "08012345678",
     * "designation": "Agro Extension Worker",
     * "photo": "http://localhost:8000/storage/agents/1624810572IMG_20210627_174358.jpg",
     * "updated_at": "2021-06-27T17:09:32.000000Z",
     * "created_at": "2021-06-27T17:09:32.000000Z",
     * "id": 1
     * }
     * }
     * @response 400 {
     * "success": false,
     * "message": "Validation error",
     * "data": {
     * "first_name": [
     * "The first name field is required."
     * ],
     * "last_name": [
     * "The last name field is required."
     * ],
     * "phone_number": [
     * "The phone number field is required."
     * ],
     * "age": [
     * "The age field is required."
     * ],
     * "residence": [
     * "The residence field is required."
     * ],
     * "referee_name": [
     * "The referee name field is required."
     * ],
     * "referee_phone_number": [
     * "The referee phone number field is required."
     * ],
     * "designation": [
     * "The designation field is required."
     * ]
     * }
     * }
     * @response 401 {
     * "success": false,
     * "message": "Unauthorized"
     * }
     * 
     * @response 500 {
     * "success": false,
     * "message": "Server error"
     * }
     * 
     * @response 403 {
     * "success": false,
     * "message": "Forbidden"
     * }
     * 
     * @response 404 {
     * "success": false,
     * "message": "Not found"
     * }
     * 
     * @response 400 {
     * "success": false,
     * "message": "Bad request"
     * }
     * 
     * @response 405 {
     * "success": false,
     * "message": "Method not allowed"
     * }
     * 
     * 
     */
    public function store(Request $request)
    {
        
        $validated =Validator::make($request->all(),[
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'nullable|email',
            'phone_number' => 'required|string',
            'age' => 'required|integer',
            'gender' => 'required|string',
            'residence' => 'required|string',
            'referee_name' => 'required|string',
            'referee_phone_number' => 'required|string',
            'designation' => 'required|string',
            'created_by' => 'required|integer',
            'fpo_id' => 'required|integer'
        ]);

        if($validated->fails()){
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'data' => $validated->errors()
            ], 400);
        }
            
        $agent = new Agent();
        $agent->first_name = $request->first_name;
        $agent->last_name = $request->last_name;
        $agent->email = $request->email;
        $agent->phone_number = $request->phone_number;
        $agent->age = $request->age;
        $agent->gender = $request->gender;
        $agent->residence = $request->residence;
        $agent->referee_name = $request->referee_name;
        $agent->referee_phone_number = $request->referee_phone_number;
        $agent->designation = $request->designation;
        $agent->photo = null;
        $agent->created_by = $request->created_by;
        $agent->fpo_id = $request->fpo_id;
        $agent->save();

        if(!$agent){
            return response()->json([
                'success' => false,
                'message' => 'Agent not created',
                'data' => null
            ], 500);
        }
           

            //Create a user account for the agent
            $user = new User();
            $user->name = $agent->first_name.' '.$agent->last_name;
            $user->email = $agent->email;
            $user->phone_number = $agent->phone_number;
            $user->password = Hash::make('password');
            $user->role = 'agent';
            $user->save();

            if(!$user){
                return response()->json([
                    'success' => false,
                    'message' => 'User account not created',
                    'data' => null
                ], 500);
            }
            

        return response()->json([
            'success' => true,
            'message' => 'Agent created successfully',
            'data' => $agent
        ], 201);

    }

    /**
     * Get Agent
     * 
     * @authenticated
     * 
     * @urlParam agent required The id of the agent. Example: 1
     * 
     * @response {
     * "success": true,
     * "message": "Agent retrieved successfully",
     * "data": {
     * "id": 1,
     * "first_name": "John",
     * "last_name": "Doe",
     * "email": "",
     * "phone_number": "256XXXXXXXXX",
     * "age": "30",
     * "residence": "Kampala",
     * "referee_name": "Jane Doe",
     * "referee_phone_number": "08012345678",
     * "designation": "Agro Extension Worker",
     * "photo": "http://localhost:8000/storage/agents/1624810572IMG_20210627_174358.jpg",
     * "created_at": "2021-06-27T17:09:32.000000Z",
     * "updated_at": "2021-06-27T17:09:32.000000Z"
     * }
     * }
     * @response 404 {
     * "success": false,
     * "message": "Agent not found",
     * "data": null
     * }
     * 
     */
    public function show($agent)
    {
        $agent = Agent::find($agent);
        if(!$agent)
            return response()->json([
                'success' => false,
                'message' => 'Agent not found',
                'data' => null
            ], 404);

        return response()->json([
            'success' => true,
            'message' => 'Agent retrieved successfully',
            'data' => $agent
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Agent $agent)
    {
        //
    }

    /**
     * Update the Agent
     * 
     * @authenticated
     * 
     * @urlParam id required The id of the agent. Example: 1
     * 
     * @bodyParam first_name string required The first name of the agent. Example: John
     * @bodyParam last_name string required The last name of the agent. Example: Doe
     * @bodyParam email string required The email of the agent. Example:
     * @bodyParam phone_number string required The phone number of the agent. Example: 256XXXXXXXXX
     * @bodyParam age string required The age of the agent. Example: 30
     * @bodyParam residence string required The residence of the agent. Example: Kampala
     * @bodyParam referee_name string required The referee name of the agent. Example: Jane Doe
     * @bodyParam referee_phone_number string required The referee phone number of the agent. Example: 08012345678
     * @bodyParam designation string required The designation of the agent. Example: Agro Extension Worker
     * 
      * @response {
     * "success": true,
     * "message": "Agent created successfully",
     * "data": {
     * "first_name": "John",
     * "last_name": "Doe",
     * "email": "",
     * "phone_number": "256XXXXXXXXX",
     * "age": "30",
     * "residence": "Kampala",
     * "referee_name": "Jane Doe",
     * "referee_phone_number": "08012345678",
     * "designation": "Agro Extension Worker",
     * "photo": "http://localhost:8000/storage/agents/1624810572IMG_20210627_174358.jpg",
     * "updated_at": "2021-06-27T17:09:32.000000Z",
     * "created_at": "2021-06-27T17:09:32.000000Z",
     * "id": 1
     * }
     * }
     * @response 400 {
     * "success": false,
     * "message": "Validation error",
     * "data": {
     * "first_name": [
     * "The first name field is required."
     * ],
     * "last_name": [
     * "The last name field is required."
     * ],
     * "phone_number": [
     * "The phone number field is required."
     * ],
     * "age": [
     * "The age field is required."
     * ],
     * "residence": [
     * "The residence field is required."
     * ],
     * "referee_name": [
     * "The referee name field is required."
     * ],
     * "referee_phone_number": [
     * "The referee phone number field is required."
     * ],
     * "designation": [
     * "The designation field is required."
     * ]
     * }
     * }
     * 
     * @response 404 {
     * "success": false,
     * "message": "Agent not found",
     * "data": null
     * }
     * 
     * @response 500 {
     * "success": false,
     * "message": "Server error"
     * }
     * 
     * @response 403 {
     * "success": false,
     * "message": "Forbidden"
     * }
     */
    public function update(Request $request, $id)
    {
        //Update the agent
        $agent = Agent::find($id);
        if(!$agent)
            return response()->json([
                'success' => false,
                'message' => 'Agent not found',
                'data' => null
            ], 404);

        $validate = Validator($request->all(),[
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'nullable|email',
            'phone_number' => 'required|string',
            'age' => 'required|integer',
            'gender' => 'required|string',
            'residence' => 'required|string',
            'referee_name' => 'required|string',
            'referee_phone_number' => 'required|string',
            'designation' => 'required|string',
            'created_by' => 'required|integer',
            'fpo_id' => 'required|integer'
        ]);

        if($validate->fails())
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'data' => $validate->errors()
            ], 400);

        $agent->first_name = $request->first_name;
        $agent->last_name = $request->last_name;
        $agent->email = $request->email;
        $agent->phone_number = $request->phone_number;
        $agent->age = $request->age;
        $agent->gender = $request->gender;
        $agent->residence = $request->residence;
        $agent->referee_name = $request->referee_name;
        $agent->referee_phone_number = $request->referee_phone_number;
        $agent->designation = $request->designation;
        $agent->photo = null;
        $agent->created_by = $request->created_by;
        $agent->fpo_id = $request->fpo_id;
        $agent->save();

        if(!$agent)
            return response()->json([
                'success' => false,
                'message' => 'Agent not updated',
                'data' => null
            ], 500);

        return response()->json([
            'success' => true,
            'message' => 'Agent updated successfully',
            'data' => $agent
        ], 200);

    }

  
    /**
     * Delete the agent
     * 
     * @authenticated
     * 
     * @urlParam id required The id of the agent. Example: 1
     * 
     * @response {
     * "success": true,
     * "message": "Agent deleted successfully",
     * "data": {
     * "id": 1,
     * "first_name": "John",
     * "last_name": "Doe",
     * "email": "",
     * "phone_number": "256XXXXXXXXX",
     * "age": "30",
     * "residence": "Kampala",
     * "referee_name": "Jane Doe",
     * "referee_phone_number": "08012345678",
     * "designation": "Agro Extension Worker",
     * "photo": "http://localhost:8000/storage/agents/1624810572IMG_20210627_174358.jpg",
     * "created_at": "2021-06-27T17:09:32.000000Z",
     * "updated_at": "2021-06-27T17:09:32.000000Z"
     * }
     * 
     * @response 404 {
     * "success": false,
     * "message": "Agent not found",
     * "data": null
     * }
     * 
     * @response 500 {
     * "success": false,
     * "message": "Server error"
     * }
     * 
     * @response 403 {
     * "success": false,
     * "message": "Forbidden"
     * }
     * 
     * @response 400 {
     * "success": false,
     * "message": "Bad request"
     * }
     * 
     * 
     * 
     */
    public function destroy($id)
    {
        //Delete Agent
        $agent = Agent::find($id);
        if(!$agent)
            return response()->json([
                'success' => false,
                'message' => 'Agent not found',
                'data' => null
            ], 404);

        $agent->delete();

        if(!$agent)
            return response()->json([
                'success' => false,
                'message' => 'Agent not deleted',
                'data' => null
            ], 500);

        return response()->json([
            'success' => true,
            'message' => 'Agent deleted successfully',
            'data' => $agent
        ], 200);
    }
}