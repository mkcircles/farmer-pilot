<?php

use App\Http\Controllers\API\FarmerProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/farmer/register', [FarmerProfileController::class, 'registerFarmer']);
Route::get('/farmer/profiles', [FarmerProfileController::class, 'get_farmer_profiles']);