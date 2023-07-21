<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use App\Models\Api;
use App\Models\FarmerProfile;
use App\Models\User;
use App\Traits\HelperTraits;
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
    use HelperTraits;
    /**
     * Get all agents
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
        $agents = Agent::orderBy('id', 'desc')->paginate();
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
     * @header Authorization required The authorization token. Example: Bearer {token}
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
     * 
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
        $agent->agent_code = $this->generateAgentCode();
        $agent->first_name = $request->first_name;
        $agent->last_name = $request->last_name;
        $agent->email = $request->email;
        $agent->phone_number = $this->formatMobilePhoneNumber($request->phone_number);
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
     * This endpoint allows a user to get a specific agent
     * @authenticated
     * 
     * @header Authorization required The authorization token. Example: Bearer {token}
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

   
    public function update(Request $request, $id)
    {
        //Update the agent
        $agent = Agent::find($id);
        $user = User::where('phone_number', $agent->phone_number)->first();

        if(!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Agent user account not found',
                'data' => null
            ], 404);
        }

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
        $agent->phone_number = $this->formatMobilePhoneNumber($request->phone_number);
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

        // Update a user account for the agent
        $user->name = $agent->first_name.' '.$agent->last_name;
        $user->email = $agent->email;
        $user->phone_number = $agent->phone_number;
        $user->save();

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

    //Get Agent Regered Farmers
    /**
     * Get Agent Registered Farmers
     * 
     * This endpoint allows a user to get all farmers registered by a specific agent
     * @authenticated
     * 
     * @header Authorization required The authorization token. Example: Bearer {token}
     * 
     * @urlParam agent_id required The id of the agent. Example: 1
     * 
     * @response {
     * "success": true,
     * "message": "Farmers retrieved successfully",
     * "data": {
     * "current_page": 1,
     * "data": [
     * {
     * "id": 1,
     * "first_name": "John",
     * "last_name": "Doe",
     * "email": "",
     * ...
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
     * }
     * 
     * @response 404 {
     * "success": false,
     * "message": "No farmers found",
     * "data": null
     * }
     * 
     */
    public function getAgentFarmers(string $agent_id)
    {
        $farmers = FarmerProfile::where('agent_id', $agent_id)->orderBy('id', 'desc')->paginate();
        if(count($farmers) == 0){
            return response()->json([
                'success' => false,
                'message' => 'No farmers found',
                'data' => null
            ], 404);
        }
            

        return response()->json([
            'success' => true,
            'message' => 'Farmers retrieved successfully',
            'data' => $farmers
        ], 200);
    }

    /**
     * Search Agent
     * 
     * This endpoint allows a user to search for a specific agent by agent code
     * 
     * @header Authorization required The authorization token. Example: Basic {api_key}
     * 
     * @bodyParam agent_id required The id of the agent. Example: AGT001
     * @bodyParam first_name required The first name of the agent. Example: John
     * 
     * @response {
     * "status": "success",
     * "data": {
     * "id": 1,
     * "agent_code": "AGT001",
     * "first_name": "John",
     * "last_name": "Doe",
     * "photo": "http://url.test/storage/agents/1624810572IMG_20210627_174358.jpg",
     * "created_at": "2021-06-27T17:09:32.000000Z",
     * }
     * }
     * 
     * @response 400 {
     * "status": "error",
     * "message": "Validation error",
     * }
     * 
     * 
     * @response 404 {
     * "status": "error",
     * "message": "Agent not found"
     * }
     * 
     * @response 401 {
     * "status": "error",
     * "message": "Invalid token"
     * }
     * 
     */
    public function getSearchAgent(Request $request)
    {
        //Get Authourization token
        //  $token = $request->header('Authorization');
        //  $token = explode(' ', $token);
        //  $validate = $this->validateToken($token[1]);
        //  //check if token is valid
        //  if($validate->getStatusCode() == 401)
        //      return response()->json([
        //          'status' => 'error',
        //          'message' => 'Invalid token'
        //      ], 401);
 
         

        $validated = Validator::make($request->all(),[
            'agent_id' => 'required|string',
            'first_name' => 'required|string'
        ]);

        if($validated->fails()){
            return response()->json([
                'status' => 'error',
                'message' => $validated->errors()->first()
            ], 400);
        }


        $agent = Agent::where('agent_code',$request->agent_id)->first();
        if(!$agent){
            return response()->json([
                'status' => 'error',
                'message' => 'Agent not found'
            ], 404);
        }
        else{
           if($agent->first_name != $request->first_name){
                return response()->json([
                    'status' => 'error',
                    'message' => 'Mismatched agent name'
                ], 404);
            }
            return response()->json([
                'status' => 'success',
                'data' => [
                    'id' => $agent->id,
                    'agent_code' => $agent->agent_code,
                    'first_name' => $agent->first_name,
                    'last_name' => $agent->last_name,
                    'photo' => $agent->photo,
                    'created_at' => $agent->created_at,
                ]
            ], 200);
        }
        
    }

    //Get all Agents
    /**
     * Get all Agents
     * 
     * This endpoint allows a user to get all agents
     * 
     * @header Authorization required The authorization token. Example: Basic {api_key}
     * 
     * @response {
     * "status": "success",
     * "data": [
     * {
     * "id": 1,
     * "agent_code": "AGT001",
     * "first_name": "John",
     * "last_name": "Doe",
     * "photo": "http://url.test/storage/agents/1624810572IMG_20210627_174358.jpg",
     * "created_at": "2021-06-27T17:09:32.000000Z",
     * },
     * {
     * "id": 2,
     * "agent_code": "AGT002",
     * "first_name": "Jane",
     * "last_name": "Doe",
     * "photo": "http://url.test/storage/agents/1624810572IMG_20210627_174358.jpg",
     * "created_at": "2021-06-27T17:09:32.000000Z",
     * }
     * ]
     * }
     * 
     * @response 404 {
     * "status": "error",
     * "message": "No agents found"
     * }
     * 
     * @response 401 {
     * "status": "error",
     * "message": "Invalid token"
     * }
     * 
     */
    public function getAllAgents(Request $request)
    {
        //validate that Authorization header is present
        // if(!$request->header('Authorization')){
        //     return response()->json([
        //         'status' => 'error',
        //         'message' => 'Authorization header missing'
        //     ], 401);
        //Get Authourization token
        // $token = $request->header('Authorization');
        // $token = explode(' ', $token);
        // $validate = $this->validateToken($token[1]);
        // //check if token is valid
        // if($validate->getStatusCode() == 401)
        //     return response()->json([
        //         'status' => 'error',
        //         'message' => 'Invalid token'
        //     ], 401);

        
        $agents = Agent::select('id','agent_code','first_name','last_name','photo','created_at')->get();
        if(!$agents){
            return response()->json([
                'status' => 'error',
                'message' => 'No agents found'
            ], 404);
        }
        else{
            return response()->json([
                'status' => 'success',
                'data' => $agents
            ], 200);
        }
    }

    //Validate Authorisation Token
    public function validateToken($token)
    {
        $user = Api::where('api_key',$token)->first();
        if(!$user){
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid token'
            ], 401);
        }
        else{
            return response()->json([
                'status' => 'success',
                'data' => $user
            ], 200);
        }
    }

    /**
     * Search Agent with Basic Auth
     * 
     * This endpoint allows a user to search for a specific agent by agent code
     * 
     * @header Authorization required The authorization token. Example: Basic {api_key}
     * 
     * @bodyParam agent_id required The id of the agent. Example: AGT001
     * @bodyParam first_name required The first name of the agent. Example: John
     * 
     * @response {
     * "status": "success",
     * "data": {
     * "id": 1,
     * "agent_code": "AGT001",
     * "first_name": "John",
     * "last_name": "Doe",
     * "photo": "http://url.test/storage/agents/1624810572IMG_20210627_174358.jpg",
     * "created_at": "2021-06-27T17:09:32.000000Z",
     * }
     * }
     * 
     * @response 400 {
     * "status": "error",
     * "message": "Validation error",
     * }
     * 
     * 
     * @response 404 {
     * "status": "error",
     * "message": "Agent not found"
     * }
     * 
     * @response 401 {
     * "status": "error",
     * "message": "Invalid token"
     * }
     * 
     */
    public function getSearchAgentAuth(Request $request)
    {
        //validate that Authorization header is present
        if(!$request->header('Authorization')){
            return response()->json([
                'status' => 'error',
                'message' => 'Authorization header missing'
            ], 401);
        }

         //Get Authourization token
         $token = $request->header('Authorization');
         $token = explode(' ', $token);
         $validate = $this->validateToken($token[1]);
         //check if token is valid
         if($validate->getStatusCode() == 401)
             return response()->json([
                 'status' => 'error',
                 'message' => 'Invalid token'
             ], 401);
 
        

        $validated = Validator::make($request->all(),[
            'agent_id' => 'required|string',
            'first_name' => 'required|string'
        ]);

        if($validated->fails()){
            return response()->json([
                'status' => 'error',
                'message' => $validated->errors()->first()
            ], 400);
        }


        $agent = Agent::where('agent_code',$request->agent_id)->first();
        if(!$agent){
            return response()->json([
                'status' => 'error',
                'message' => 'Agent not found'
            ], 404);
        }
        else{
           if($agent->first_name != $request->first_name){
                return response()->json([
                    'status' => 'error',
                    'message' => 'Mismatched agent name'
                ], 404);
            }
            return response()->json([
                'status' => 'success',
                'data' => [
                    'id' => $agent->id,
                    'agent_code' => $agent->agent_code,
                    'first_name' => $agent->first_name,
                    'last_name' => $agent->last_name,
                    'photo' => $agent->photo,
                    'created_at' => $agent->created_at,
                ]
            ], 200);
        }
        
    }

    /**
     * Add device to agent
     * 
     * This endpoint allows a user to add a device to an agent
     * @authenticated
     * 
     * @header Authorization required The authorization token. Example: Bearer {token}
     * 
     * @bodyParam agent_id integer required The id of the agent. Example: 1
     * @bodyParam brand string required The brand of the device. Example: Samsung
     * @bodyParam device_id integer required The id of the device. Example: 123456
     * 
     * @response {
     * "success": true,
     * "message": "Device added to agent successfully",
     * "data": {
     * "id": 1,
     * "agent_code": "AGT001",
     * "first_name": "John",
     * "last_name": "Doe",
     * "photo": "http://url.test/storage/agents/1624810572IMG_20210627_174358.jpg",
     * "created_at": "2021-06-27T17:09:32.000000Z",
     * }
     * }
     * 
     * @response 400 {
     * "success": false,
     * "message": "Validation error",
     * "data": {
     * "agent_id": [
     * "The agent id field is required."
     * ],
     * "brand": [
     * "The brand field is required."
     * ],
     * "device_id": [
     * "The device id field is required."
     * ]
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
     * "message": "Device not added to agent",
     * "data": null
     * }
     * 
     * 
     */
    public function addDeviceToAgent(Request $request)
    {
        $validated = Validator::make($request->all(),[
            'agent_id' => 'required|integer',
            'brand' => 'required|string',
            'device_id' => 'required|integer'
        ]);

        if($validated->fails()){
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'data' => $validated->errors()
            ], 400);
        }

        $agent = Agent::find($request->agent_id);
        if(!$agent){
            return response()->json([
                'success' => false,
                'message' => 'Agent not found',
                'data' => null
            ], 404);
        }

        $agent->device_id = $request->brand.'-'.$request->device_id;
        $agent->save();

        if(!$agent){
            return response()->json([
                'success' => false,
                'message' => 'Device not added to agent',
                'data' => null
            ], 500);
        }

        return response()->json([
            'success' => true,
            'message' => 'Device added to agent successfully',
            'data' => $agent
        ], 200);
    }


}

