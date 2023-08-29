<?php

use App\Http\Controllers\API\AgentController;
use App\Http\Controllers\API\DataController;
use App\Http\Controllers\API\FarmerProfileController;
use App\Http\Controllers\API\FPOController;
use App\Http\Controllers\API\LocationController;
use App\Http\Controllers\API\ReportController;
use App\Http\Controllers\API\SummaryController;
use App\Http\Controllers\AUTH\AuthController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\UnffeOutreachController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Seeder\FarmerSeederController;

use App\Http\Controllers\Migration\DataMigrationController;

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

Route::get('/import/unffe', [FarmerSeederController::class, 'importUnffeOutReach']);

Route::group(['prefix' => 'migration'], function () {
    Route::get('/agents/latest', [DataMigrationController::class, 'getLatestAgents']);
    Route::get('/agents/{limit}', [DataMigrationController::class, 'getAgents']);
    Route::get('/farmers/latest', [DataMigrationController::class, 'getLatestFarmers']);
    Route::get('/farmers/{limit}', [DataMigrationController::class, 'getFarmers']);
    Route::get('/unffe/outreach/{limit}', [DataMigrationController::class, 'getUnffeOutreach']);

});

Route::get('/', function () {
    return response()->json(['message' => 'Welcome to the Agri-Hub API']);
});
Route::get('/agents/all', [AgentController::class, 'getAllAgents']);
Route::post('/agent/search', [AgentController::class, 'getSearchAgent']);
Route::post('/agent/search/auth', [AgentController::class, 'getSearchAgentAuth']);

Route::get('/district',[LocationController::class, 'importDistrictSeeder']);

Route::controller(AuthController::class)->group(function () {
    Route::post('/login', 'login');
    Route::post('/logout', 'logout');
});



Route::middleware('auth:sanctum','logrequest')->group( function () {
    Route::post('/refresh', [AuthController::class, 'refresh']);
    //Summaries
    Route::get('/summary', [SummaryController::class, 'DashboardSummary']);
    Route::get('/summary/fpo', [SummaryController::class, 'FPODashboardSumary']);
    Route::get('/summary/unffe',[SummaryController::class,'UNFFESummary']);


    //Users Routes
    Route::get('/users',[UserController::class, 'index']);
    Route::post('/user/register', [UserController::class, 'store']);
    Route::get('/user/{id}', [UserController::class, 'show']);
    Route::post('/user/{id}/update', [UserController::class, 'update']);
    Route::put('/user/status/update', [UserController::class, 'updateUserStatus']);
    Route::get('/user/{id}/password/reset', [UserController::class, 'resetUserPassword']);
    Route::put('/user/password/update', [UserController::class, 'updateUserPassword']);


    Route::post('/farmer/register', [FarmerProfileController::class, 'registerFarmer']);
    Route::get('/farmers', [DataController::class, 'getAllFarmers']);
    Route::get('/farmers/bio', [DataController::class, 'getAllFarmerWithBiometrics']);
    Route::get('/farmers/bio/failed', [DataController::class, 'getFailedBiometricCaptures']);
    Route::get('/farmers/bio/duplicates', [DataController::class, 'getDuplicateBiometricCaptures']);
    Route::get('/farmer/{farmer_id}', [DataController::class, 'getFarmer']);
    Route::put('/farmer/update/status', [FarmerProfileController::class, 'updateFarmerProfileStatus']);
    Route::get('/farmers/search/{keyword}', [FarmerProfileController::class, 'searchFarmer']);

    Route::get('/agents', [AgentController::class, 'index']);
    Route::post('/agent/register', [AgentController::class, 'store']);
    Route::get('/agent/{agent_code}', [AgentController::class, 'show']);
    Route::post('/agent/{id}/update', [AgentController::class, 'update']);
    Route::get('/agent/{agent_id}/farmers', [AgentController::class, 'getAgentFarmers']);
    Route::post('/agent/device/add', [AgentController::class, 'addDeviceToAgent']);
    Route::get('/agent/{agent_id}/farmers/count', [AgentController::class, 'getAgentFarmersCount']);
    Route::get('/agents/graph', [AgentController::class, 'getAgentGraph']);
    Route::put('/agent/status/update', [AgentController::class, 'updateAgentStatus']);
    Route::post('/agent/farmers/status', [AgentController::class, 'getAgentFarmersByStatus']);

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

    Route::get('/farmer/date/summary', [DataController::class, 'countFarmersByDate']);
    Route::get('/farmer/fpo/summary', [DataController::class, 'countFarmersByFPO']);
    Route::get('/bio/summary', [SummaryController::class, 'getBioSummary']);

    //Location Routes
    Route::get('/districts',[DataController::class, 'getDistricts']);

    //UNFFE Routes
    Route::group(['prefix' => 'unffe'], function () {
        Route::get('/outreach', [UnffeOutreachController::class, 'getUnffeOutreach']);
        Route::post('/outreach/register', [UnffeOutreachController::class, 'registerUnffeOutreach']);
        Route::get('/outreach/{id}', [UnffeOutreachController::class, 'getUnffeOutreachById']);
        Route::post('/outreach/{id}/update', [UnffeOutreachController::class, 'updateUnffeOutreach']);
        Route::delete('/outreach/{id}', [UnffeOutreachController::class, 'deleteUnffeOutreach']);
        Route::post('/outreach/search', [UnffeOutreachController::class, 'searchUnffeOutreach']);
    });


    //Reports Routes
    Route::get('/reports', [ReportController::class, 'index']);
    Route::post('/report/register', [ReportController::class, 'createReport']);
    Route::delete('/report/{id}', [ReportController::class, 'deleteReport']);

});



