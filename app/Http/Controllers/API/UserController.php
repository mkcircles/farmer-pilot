<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx\Rels;

/**
 * @group Users Management
 *
 * APIs for generating and managing users
 */
class UserController extends Controller
{
    /**
     * Get all users
     *
     * Get a list of all users
     * @authenticated
     *
     * response 200 {
     *     "status": "success",
     *     "data": [
     *         {
     *             "id": 1,
     * "name": "Maurice Kamugisha",
     * "email": "mF5uT@example.com",
     * "phone_number": "256781456492",
     * "role": "admin",
     * "photo": "https://ui-avatars.com/api/?name=Maurice+Kamugisha&size=128",
     * "created_at": "2022-01-01T00:00:00.000000Z",
     * },
     * {
     * "id": 1,
     * "name": "User 1",
     * "email": "mF5uT@example.com",
     * "phone_number": "256781456491",
     * "role": "admin",
     * "photo": "https://ui-avatars.com/api/?name=User+One&size=128",
     * "created_at": "2022-01-01T00:00:00.000000Z",
     * }
     * ]
     *
     *
     */
    public function index(Request $request)
    {
        $user = $request->user();
        if($user->role=='fpo_user'){
            $users = User::where('fpo_id',$user->entity_id)->paginate();
        }else
            $users = User::whereIn('role',['admin','user'])->orderBy('id', 'desc')->paginate();

        return response()->json([
            'status' => 'success',
            'data' => $users
        ]);
    }

    /**
     * Create a new user
     *
     * Create a new user
     * @authenticated
     *
     * @header Authorization required The authorization token. Example: Bearer {token}
     * 
     * @bodyParam name string required The name of the user. Example: Maurice Kamugisha
     * @bodyParam email string required The email of the user. Example: mF5uT@example.com
     * @bodyParam phone_number string required The phone number of the user. Example: 256781456492
     * @bodyParam role string required The role of the user. Example: admin,user
     * 
     * @response 200 {
     *     "status": "success",
     *     "data": {
     *         "id": 1,
     *         "name": "Maurice Kamugisha",
     *         "email": "mF5uT@example.com",
     *         "phone_number": "256781456492",
     *         "role": "admin",
     *         "photo": "https://ui-avatars.com/api/?name=Maurice+Kamugisha&size=128",
     *         "created_at": "2022-01-01T00:00:00.000000Z",
     *     }
     * }
     * 
     * @response 400 {
     *     "status": "error",
     *     "message": [
     *         "The given data was invalid."
     *     ],
     * }
     * 
     * @response 401 {
     *     "status": "error",
     *     "message": [
     *         "Unauthenticated."
     *     ]
     * }
     * 
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|unique:users',
            'phone_number' => 'required',
            'role' => 'required|in:admin,user'
        ]);

        if($validate->fails()){
            return response()->json([
                'status' => 'error',
                'message' => $validate->errors()
            ]);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'role' => $request->role,
            'photo' => 'https://ui-avatars.com/api/?name=' . urlencode($request->name) . '&size=128',
            'password' => bcrypt('password')
        ]);
        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'User not created'
            ]);
        }
        return response()->json([
            'status' => 'success',
            'data' => $user
        ]);

    }

    /**
     * Get User by id
     * 
     * Fetch a user by id
     * @authenticated
     * 
     * @header Authorization required The authorization token. Example: Bearer {token}
     * @headerparam id integer required User id
     * 
     * @response 200 {
     *     "status": "success",
     *     "data": {
     *         "id": 1,
     *         "name": "Maurice Kamugisha",
     *         "email": "mF5uT@example.com",
     *         "phone_number": "256781456492",
     *         "role": "admin",
     *         "photo": "https://ui-avatars.com/api/?name=Maurice+Kamugisha&size=128",
     *         "created_at": "2022-01-01T00:00:00.000000Z",
     *     }
     * }
     * 
     * @response 404 {
     *     "status": "error",
     *     "message": [
     *         "User not found."
     *     ],
     * }
     * 
     * @response 401 {
     *     "status": "error",
     *     "message": [
     *         "Unauthenticated."
     *     ]
     * }
     * 
     */
    public function show(string $id)
    {
        $user = User::find($id);

        return response()->json([
            'status' => 'success',
            'data' => $user
        ]);
    }


    /**
     * Update user
     * 
     * Update user details
     * @authenticated
     * 
     * @header Authorization required The authorization token. Example: Bearer {token}
     * @headerparam id integer required User id
     * 
     * @bodyParam name string required The name of the user
     * @bodyParam email string required The email of the user
     * @bodyParam phone_number string required The phone number of the user
     * @bodyParam role string required The role of the user
     * 
     * @response 200 {
     *     "status": "success",
     *     "data": {
     *         "id": 1,
     *         "name": "Maurice Kamugisha",
     *         "email": "mF5uT@example.com",
     *         "phone_number": "256781456492",
     *         "role": "admin",
     *         "photo": "https://ui-avatars.com/api/?name=Maurice+Kamugisha&size=128",
     *         "created_at": "2022-01-01T00:00:00.000000Z",
     *     }
     * }
     * 
     * @response 404 {
     *     "status": "error",
     *     "message": [
     *         "User not found."
     *     ],
     * }
     * 
     * @response 401 {
     *     "status": "error",
     *     "message": [
     *         "Unauthenticated."
     *     ]
     * }
     * 
     */
    public function update(Request $request, string $id)
    {
        $validate = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|unique:users,email,'.$request->id,
            'phone_number' => 'required',
            'role' => 'required|in:admin,user'
        ]);

        if($validate->fails()){
            return response()->json([
                'status' => 'error',
                'message' => $validate->errors()
            ]);
        }

        //update user with shared id
        $user = User::find($id);
        if(!$user){
            return response()->json([
                'status' => 'error',
                'message' => 'User not found'
            ]);
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->role = $request->role;
        $user->save();

        return response()->json([
            'status' => 'success',
            'data' => $user
        ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * Update user status
     * 
     * Update user status
     * @authenticated
     * 
     * @bodyParam id string required The id of the user
     * @bodyParam status string required The status of the user
     * 
     * @response 200 {
     *     "status": "success",
     *     "data": {
     *         "id": 1,
     *         "name": "Maurice Kamugisha",
     *         "email": "mF5uT@example.com",
     *         "phone_number": "256781456492",
     *         "role": "admin",
     *         "photo": "https://ui-avatars.com/api/?name=Maurice+Kamugisha&size=128",
     *         "created_at": "2022-01-01T00:00:00.000000Z",
     *     }
     * }
     * 
     * @response 400 {
     *     "status": "error",
     *     "message": [
     *         "The given data was invalid."
     *     ],
     * }
     * 
     * @response 401 {
     *     "status": "error",
     *     "message": [
     *         "Unauthenticated."
     *     ]
     * }
     * 
     */
    public function updateUserStatus(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'id' => 'required|string',
            'status' => 'required|in:active,inactive'
        ]);
        if($validate->fails()){
            return response()->json([
                'status' => 'error',
                'message' => $validate->errors()
            ]);
        }

        $user = User::find($request->id);
        if(!$user){
            return response()->json([
                'status' => 'error',
                'message' => 'User not found'
            ]);
        }
        $user->status = $request->status;
        $user->save();

        return response()->json([
            'status' => 'success',
            'message' => 'User status updated',
            'data' => $user
        ]);
        
    }

    //Reset password
    /**
     * Reset user password
     * 
     * Reset user password
     * @authenticated
     * 
     * @bodyParam id string required The id of the user
     * 
     * @response 200 {
     *     "status": "success",
     *     "data": {
     *         "id": 1,
     *         "name": "Maurice Kamugisha",
     *         "email": "mF5uT@example.com",
     *         "phone_number": "256781456492",
     *         "role": "admin",
     *         "photo": "https://ui-avatars.com/api/?name=Maurice+Kamugisha&size=128",
     *         "created_at": "2022-01-01T00:00:00.000000Z",
     *     }
     * }
     * 
     * @response 400 {
     *     "status": "error",
     *     "message": [
     *         "The given data was invalid."
     *     ],
     * }
     * 
     * @response 401 {
     *     "status": "error",
     *     "message": [
     *         "Unauthenticated."
     *     ]
     * }
     * 
     * @response 404 {
     *     "status": "error",
     *     "message": [
     *         "User not found."
     *     ]
     * }
     * 
     */
    public function resetUserPassword($id)
    {
        $user = User::find($id);
        if(!$user){
            return response()->json([
                'status' => 'error',
                'message' => 'User not found'
            ]);
        }
        $user->password = bcrypt('password');
        $user->save();
        return response()->json([
            'status' => 'success',
            'message' => 'User password updated',
            'data' => $user
        ]);
    }

    //Update user password
    /**
     * Update user password
     * 
     * Update user password
     * @authenticated
     * 
     * @header Authorization required The authorization token. Example: Bearer {token}
     * 
     * @bodyParam id string required The id of the user
     * @bodyParam password string required The password of the user
     * 
     * @response 200 {
     *     "status": "success",
     *     "data": {
     *         "id": 1,
     *         "name": "Maurice Kamugisha",
     *         "email": "mF5uT@example.com",
     *         "phone_number": "256781456492",
     *         "role": "admin",
     *         "photo": "https://ui-avatars.com/api/?name=Maurice+Kamugisha&size=128",
     *         "created_at": "2022-01-01T00:00:00.000000Z",
     *     }
     * }
     * 
     * @response 400 {
     *     "status": "error",
     *     "message": [
     *         "The given data was invalid."
     *     ],
     * }
     * 
     * @response 401 {
     *     "status": "error",
     *     "message": [
     *         "Unauthenticated."
     *     ]
     * }
     * 
     * @response 404 {
     *     "status": "error",
     *     "message": [
     *         "User not found."
     *     ]
     * }
     * 
     */
    public function updateUserPassword(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'id' => 'required|string',
            'password' => 'required|string|min:6|confirmed'
        ]);
        if($validate->fails()){
            return response()->json([
                'status' => 'error',
                'message' => $validate->errors()
            ]);
        }
        
        $user = User::find($request->id);
        if(!$user){
            return response()->json([
                'status' => 'error',
                'message' => 'User not found'
            ]);
        }
        //Check if logged in user is the same as the user
        if($user->id == $request->id){
            $user->password = bcrypt($request->password);
            $user->save();
            return response()->json([
                'status' => 'success',
                'message' => 'User password updated',
                'data' => $user
            ]);
        }
        else{
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized'
            ]);
        }

    }
}
