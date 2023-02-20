<?php

use App\Http\Controllers\Api\Auth\EmailVerficationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\api\HotelsApi\LoginHotelController;
use App\Http\Controllers\CityController;

use App\Http\Controllers\Api\HotelsApi\RegisterHotelsController;
use App\Http\Controllers\Hotels\HotelsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout',[LoginController::class, 'logout']);

});
// Admin Routes
Route::post('/register',[RegisterController::class, 'register']);
Route::post('/login',[LoginController::class, 'login']);
Route::post('/verification-notification', [EmailVerficationController::class, 'sendVerficationEmail'])->middleware('auth:sanctum');
Route::get('verify-email/{id}/{hash}', [EmailVerficationController::class, 'verify'])->name('verification.verify');
// Hotels Routes
route::get('/Allhotles',[HotelsController::class,'index'])->middleware('auth:sanctum');
route::post('/Registerhotels',[RegisterHotelsController::class,'register']);
route::post('/LoginHotels',[LoginHotelController::class,'login']);

route::get('/City',[CityController::class,'index']);
