<?php

use App\Http\Controllers\API\AgentController;
use App\Http\Controllers\API\DataController;
use App\Http\Controllers\API\FarmerProfileController;
use App\Http\Controllers\API\FPOController;
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

Route::controller(AuthController::class)->group(function () {
    Route::post('/login', 'login');
    Route::post('/logout', 'logout');
    Route::post('/refresh', 'refresh');
});

Route::get('/agent/{agent_id}/{first_name}', [AgentController::class, 'getSearchAgent']);

Route::middleware('auth:sanctum')->group( function () {
    Route::post('/farmer/register', [FarmerProfileController::class, 'registerFarmer']);
    Route::get('/farmers', [DataController::class, 'getAllFarmers']);
    Route::get('/farmer/{id}', [DataController::class, 'getFarmer']);

    Route::get('/agents', [AgentController::class, 'index']);
    Route::post('/agent/register', [AgentController::class, 'store']);
    Route::get('/agent/{id}', [AgentController::class, 'show']);
    Route::post('/agent/{id}/update', [AgentController::class, 'update']);
    Route::get('/agent/{agent_id}/farmers', [AgentController::class, 'getAgentFarmers']);

    Route::get('/fpos', [FPOController::class, 'index']);
    Route::get('/fpos/summary', [FPOController::class, 'getFPOsSummary']);
    Route::post('/fpo/register', [FPOController::class, 'store']);
    Route::get('/fpo/{id}', [FPOController::class, 'show']);
    Route::post('/fpo/{id}/update', [FPOController::class, 'update']);
    Route::get('/fpo/{id}/agents', [FPOController::class, 'getFPOAgents']);
});



