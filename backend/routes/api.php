<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\ManufacturerController;
use App\Http\Controllers\Api\GroupController;
use App\Http\Controllers\Api\PermissionController;
use App\Http\Controllers\Api\RolesController;
use App\Http\Controllers\Api\UsersController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::get('/user', function (Request $request) {
//    return $request->user();
//});


Route::post('login',[AuthController::class,'loginUser']);

Route::post('/auth/register', [AuthController::class, 'createUser']);
Route::post('/auth/login', [AuthController::class, 'loginUser']);
Route::post('/auth/send-otp', [AuthController::class, 'sendOtp']);
Route::post('/auth/reset-password', [AuthController::class, 'resetPassword']);

Route::post('/logout', [AuthController::class, 'logoutUser']);

/**
 * search
 */

Route::get('search-nid/{query}', [\App\Http\Controllers\Api\SearchController::class, 'searchByQuery']);
//getAllAvailableCentersList
Route::get('available-vaccination-center', [\App\Http\Controllers\Api\VaccinationCenterController::class, 'getAllAvailableCentersList']);
Route::get('user-lists', [\App\Http\Controllers\Api\UsersController::class, 'index']);

Route::middleware('auth:sanctum')->group(function () {
    Route::resource('manufacturer',ManufacturerController::class, ['name' => 'admin.manufacturer']);
    // Your authenticated routes go here
    Route::resource('users', UsersController::class, ['name' => 'admin.users']);
    //Route::post('/logout', [AuthController::class, 'logoutUser']);
    Route::resource('vaccination-center', \App\Http\Controllers\Api\VaccinationCenterController::class);
    Route::resource('day-capacity-limit-day-wise', \App\Http\Controllers\Api\VaccinationCenterCapacityLimitDayWiseController::class);
});


