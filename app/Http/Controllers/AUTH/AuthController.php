<?php

namespace App\Http\Controllers\AUTH;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

/**
* @group Auth Management
* 
* APIs for managing authentication
*/

class AuthController extends Controller
{
    /**
     * Login user
     * 
     * This endpoint allows a user to login
     * 
     * @bodyParam email string required The email address or phone number of the user
     * @bodyParam password string required The password of the user
     * 
     * @response {
     * "success": true,
     * "message": "User login successfully.",
     * "data": {
     * "id": 1,
     * "name": "John Doe",
     * "email": "john@test.com",
     * "email_verified_at": null,
     * "phone_number": "256700000000",
     * "created_at": "2021-06-27T14:56:04.000000Z",
     * "updated_at": "2021-06-27T14:56:04.000000Z",
     * }
     * }
     * 
     * @response 401 {
     * "success": false,
     * "message": "Unauthorised.",
     * "data": null
     * }
     * 
     * @response 422 {
     * "message": "The given data was invalid.",
     * "errors": {
     * "email": [
     * "The email field is required."
     * ],
     * "password": [
     * "The password field is required."
     * ]
     * }
     * }
     * 
     * @response 500 {
     * "message": "Server Error."
     * }
     * 
     * 
     * 
     */
    public function login(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 
            $user = Auth::user(); 
            $success['token'] =  $user->createToken('token')->plainTextToken; 
            $success['user'] =  $user;

            return response()->json([
                'success' => true,
                'message' => 'User login successfully.',
                'data' => $success
            ], 200);
        } 
        else{ 
            //Check if user exists with phone number
            $user = User::where('phone_number', $request->email)->first();
            if(Hash::check($request->password, $user->password)){
                $success['token'] =  $user->createToken('token')->plainTextToken; 
                $success['user'] =  $user;

                return response()->json([
                    'success' => true,
                    'message' => 'User login successfully.',
                    'data' => $success
                ], 200);
            }
            else{
                return response()->json([
                    'success' => false,
                    'message' => 'Unauthorised.',
                    'data' => null
                ], 401);
            }
            return response()->json([
                'success' => false,
                'message' => 'Unauthorised.',
                'data' => null
            ], 401);
        } 
    }

    /**
     * Logout user
     * 
     * This endpoint allows a user to logout
     * @authenticated
     * 
     * @response {
     * "success": true,
     * "message": "User logged out successfully.",
     * "data": null
     * }
     * 
     * @response 401 {
     * "success": false,
     * "message": "Unauthorised.",
     * "data": null
     * }
     * 
     */
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'success' => true,
            'message' => 'User logged out successfully.',
            'data' => null
        ], 200);
    }

    //Refresh token
    /**
     * Refresh token
     * 
     * This endpoint allows a user to refresh their token
     * @authenticated
     * 
     * 
     * 
     */
    public function refresh(Request $request)
    {
        $request->user()->tokens()->delete();
        return $request->user()->createToken('token')->plainTextToken;
    }


}
