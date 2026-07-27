<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\BookingController;
use App\Http\Controllers\Api\ProfileController;

use App\Http\Controllers\Api\WorkerDashboardController;
use App\Http\Controllers\Api\WorkerBookingController;
use App\Http\Controllers\Api\WorkerServiceController;


/*
|--------------------------------------------------------------------------
| Authentication APIs
|--------------------------------------------------------------------------
*/

Route::prefix('auth')->group(function () {


    Route::post(
        '/login',
        [AuthController::class, 'login']
    );


    Route::post(
        '/register',
        [AuthController::class, 'register']
    );


    Route::middleware('auth:sanctum')->group(function () {


        Route::post(
            '/logout',
            [AuthController::class, 'logout']
        );


        Route::get(
            '/me',
            [AuthController::class, 'me']
        );


    });


});





/*
|--------------------------------------------------------------------------
| Public APIs
|--------------------------------------------------------------------------
*/

Route::get(
    '/search',
    [HomeController::class, 'search']
);


Route::get(
    '/services',
    [HomeController::class, 'services']
);


Route::get(
    '/categories',
    [HomeController::class, 'categories']
);


Route::get(
    '/nearby-workers',
    [HomeController::class, 'nearbyWorkers']
);





/*
|--------------------------------------------------------------------------
| Authenticated APIs
|--------------------------------------------------------------------------
*/

Route::middleware('auth:sanctum')->group(function () {


    /*
    |--------------------------------------------------------------------------
    | Common Profile APIs
    |--------------------------------------------------------------------------
    */


    Route::get(
        '/profile',
        [ProfileController::class, 'profile']
    );


    Route::put(
        '/profile',
        [ProfileController::class, 'update']
    );



    /*
    |--------------------------------------------------------------------------
    | Customer Booking APIs
    |--------------------------------------------------------------------------
    */


    Route::post(
        '/booking',
        [BookingController::class, 'store']
    );


    Route::get(
        '/my-bookings',
        [BookingController::class, 'index']
    );



    /*
    |--------------------------------------------------------------------------
    | Worker Profile Status
    |--------------------------------------------------------------------------
    |
    | IMPORTANT:
    | This must be BEFORE /worker/{worker}
    |
    */


    Route::get(
        '/worker/profile-status',
        [ProfileController::class, 'profileStatus']
    );



    /*
    |--------------------------------------------------------------------------
    | Worker Public Profile
    |--------------------------------------------------------------------------
    */


    Route::get(
        '/worker/{worker}',
        [HomeController::class, 'worker']
    );


});







/*
|--------------------------------------------------------------------------
| Worker APIs
|--------------------------------------------------------------------------
*/

Route::middleware([
    'auth:sanctum',
    'worker'
])
->prefix('worker')
->group(function () {



    /*
    |--------------------------------------------------------------------------
    | Worker Profile
    |--------------------------------------------------------------------------
    */


    Route::post(
        '/profile',
        [ProfileController::class, 'completeProfile']
    );

    Route::get(
        '/profile-status',
        [ProfileController::class, 'profileStatus']
    );


    /*
    |--------------------------------------------------------------------------
    | Worker Dashboard
    |--------------------------------------------------------------------------
    */


    Route::get(
        '/dashboard',
        [WorkerDashboardController::class, 'index']
    );



    /*
    |--------------------------------------------------------------------------
    | Worker Services
    |--------------------------------------------------------------------------
    */


    Route::get(
        '/services',
        [WorkerServiceController::class, 'index']
    );


    Route::post(
        '/services',
        [WorkerServiceController::class, 'store']
    );


    Route::put(
        '/services/{service}',
        [WorkerServiceController::class, 'update']
    );


    Route::delete(
        '/services/{service}',
        [WorkerServiceController::class, 'destroy']
    );



    /*
    |--------------------------------------------------------------------------
    | Worker Bookings
    |--------------------------------------------------------------------------
    */


    Route::get(
        '/bookings',
        [WorkerBookingController::class, 'bookings']
    );


    Route::patch(
        '/bookings/{booking}/accept',
        [WorkerBookingController::class, 'accept']
    );


    Route::patch(
        '/bookings/{booking}/reject',
        [WorkerBookingController::class, 'reject']
    );


    Route::patch(
        '/bookings/{booking}/complete',
        [WorkerBookingController::class, 'complete']
    );


});