<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\Api\ConfigController;
use App\Http\Controllers\Api\HomeDashboardController;

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
Route::controller(RegisterController::class)->group(function(){
    Route::post('register', 'register');
    Route::post('login', 'login');
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(ConfigController::class)->group(function(){
    Route::get('config', 'index');
});

Route::middleware('auth:sanctum')->group( function () {
    Route::resource('products', ProductController::class);
});


// Route::controller(HomeDashboardController::class)->group(function(){
//     Route::post('checkin', 'checkIn');
//     Route::post('checkout', 'checkOut');
// })->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group( function () {
    Route::controller(HomeDashboardController::class)->group(function(){
        Route::post('checkin', 'checkIn');
        Route::post('checkout', 'checkOut');
    });
});
