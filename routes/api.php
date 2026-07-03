<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\BookingController;
use App\Http\Controllers\Api\ProfileController;

/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/

Route::get(
    '/search',
    [HomeController::class, 'search']
);

Route::prefix('auth')->group(function () {

    Route::post('/login', [AuthController::class, 'login']);

    Route::post('/register', [AuthController::class, 'register']);

    Route::middleware('auth:sanctum')->group(function () {

        Route::post('/logout', [AuthController::class, 'logout']);

        Route::get('/me', [AuthController::class, 'me']);

    });

});

/*
|--------------------------------------------------------------------------
| Public APIs
|--------------------------------------------------------------------------
*/

Route::get(
    '/nearby-workers',
    [HomeController::class, 'nearbyWorkers']
);

Route::get('/services', [HomeController::class, 'services']);

Route::get('/categories', [HomeController::class, 'categories']);

Route::get('/worker/{worker}', [HomeController::class, 'worker']);

/*
|--------------------------------------------------------------------------
| Customer APIs
|--------------------------------------------------------------------------
*/

Route::middleware('auth:sanctum')->group(function () {

    Route::get('/profile', [ProfileController::class, 'profile']);

    Route::put('/profile', [ProfileController::class, 'update']);

    Route::post('/booking', [BookingController::class, 'store']);

    Route::get('/my-bookings', [BookingController::class, 'index']);

});