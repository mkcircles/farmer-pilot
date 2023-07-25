<?php

use App\Http\Controllers\API\AgentController;
use App\Http\Controllers\API\DataController;
use App\Http\Controllers\API\FarmerProfileController;
use App\Http\Controllers\API\FPOController;
use App\Http\Controllers\API\SummaryController;
use App\Http\Controllers\AUTH\AuthController;
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
Route::get('/', function () {
    return response()->json(['message' => 'Welcome to the Agri-Hub API']);
});
Route::get('/agents/all', [AgentController::class, 'getAllAgents']);
Route::post('/agent/search', [AgentController::class, 'getSearchAgent']);
Route::post('/agent/search/auth', [AgentController::class, 'getSearchAgentAuth']);


Route::controller(AuthController::class)->group(function () {
    Route::post('/login', 'login');
    Route::post('/logout', 'logout');
});



Route::middleware('auth:sanctum')->group( function () {
    Route::post('/refresh', [AuthController::class, 'refresh']);
    //Summaries
    Route::get('/summary', [SummaryController::class, 'DashboardSummary']);

    Route::post('/farmer/register', [FarmerProfileController::class, 'registerFarmer']);
    Route::get('/farmers', [DataController::class, 'getAllFarmers']);
    Route::get('/farmer/{id}', [DataController::class, 'getFarmer']);

    Route::get('/agents', [AgentController::class, 'index']);
    Route::post('/agent/register', [AgentController::class, 'store']);
    Route::get('/agent/{id}', [AgentController::class, 'show']);
    Route::post('/agent/{id}/update', [AgentController::class, 'update']);
    Route::get('/agent/{agent_id}/farmers', [AgentController::class, 'getAgentFarmers']);
    Route::post('/agent/device/add', [AgentController::class, 'addDeviceToAgent']);

    Route::get('/fpos', [FPOController::class, 'index']);
    Route::get('/fpos/summary', [FPOController::class, 'getFPOsSummary']);
    Route::post('/fpo/register', [FPOController::class, 'store']);
    Route::get('/fpo/{id}', [FPOController::class, 'show']);
    Route::post('/fpo/{id}/update', [FPOController::class, 'update']);
    Route::get('/fpo/{id}/agents', [FPOController::class, 'getFPOAgents']);
    Route::get('/fpo/{id}/farmers', [FPOController::class, 'getFPOFarmers']);
    Route::get('/fpos/coordinates', [FPOController::class, 'getFPOCoordinates']);
    Route::post('/fpo/{id}/user/add', [FPOController::class, 'createFPOUserAccount']);
    Route::get('/fpo/{id}/users', [FPOController::class, 'getFPOUserAccounts']);

    Route::get('/user/{user_id}/{status}', [FPOController::class, 'changeUserAccountStatus']);

    Route::post('/search', [DataController::class, 'search']);
    
});



