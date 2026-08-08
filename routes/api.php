<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\BookingController;
use App\Http\Controllers\Api\ProfileController;

use App\Http\Controllers\Api\WorkerDashboardController;
use App\Http\Controllers\Api\WorkerBookingController;
use App\Http\Controllers\Api\WorkerServiceController;
use App\Http\Controllers\Api\Admin\AdminDashboardController;
use App\Http\Controllers\Api\Admin\AdminUserController;
use App\Http\Controllers\Api\Admin\AdminWorkerController;
use App\Http\Controllers\Api\Admin\AdminCategoryController;
use App\Http\Controllers\Api\Admin\AdminBookingController;
use App\Http\Controllers\Api\FavoriteWorkerController;

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
| Admin APIs
|--------------------------------------------------------------------------
*/

Route::middleware([
    'auth:sanctum',
    'admin'
])->prefix('admin')->group(function () {

    Route::get(
        '/dashboard',
        [AdminDashboardController::class, 'index']
    );

    /*
|--------------------------------------------------------------------------
| Bookings
|--------------------------------------------------------------------------
*/

Route::get(
    '/bookings',
    [AdminBookingController::class, 'index']
);

Route::get(
    '/bookings/{booking}',
    [AdminBookingController::class, 'show']
);

Route::patch(
    '/bookings/{booking}/status',
    [AdminBookingController::class, 'updateStatus']
);

Route::delete(
    '/bookings/{booking}',
    [AdminBookingController::class, 'destroy']
);



    /*
    |--------------------------------------------------------------------------
    | Categories
    |--------------------------------------------------------------------------
    */

    Route::get('/categories', [AdminCategoryController::class, 'index']);

    Route::post('/categories', [AdminCategoryController::class, 'store']);

    Route::get('/categories/{category}', [AdminCategoryController::class, 'show']);

    Route::put('/categories/{category}', [AdminCategoryController::class, 'update']);

    Route::delete('/categories/{category}', [AdminCategoryController::class, 'destroy']);

    Route::patch('/categories/{category}/status', [AdminCategoryController::class, 'status']);
/*
|--------------------------------------------------------------------------
| Users
|--------------------------------------------------------------------------
*/


Route::patch(
    'workers/{user}/generate-password',
    [AdminWorkerController::class, 'generatePassword']
);



/*
|--------------------------------------------------------------------------
| Users
|--------------------------------------------------------------------------
*/

Route::get(
    '/users',
    [AdminUserController::class, 'index']
);

Route::get(
    '/users/{user}',
    [AdminUserController::class, 'show']
);

Route::put(
    '/users/{user}',
    [AdminUserController::class, 'update']
);

Route::delete(
    '/users/{user}',
    [AdminUserController::class, 'destroy']
);

Route::patch(
    '/users/{user}/status',
    [AdminUserController::class, 'status']
);

});

/*
|--------------------------------------------------------------------------
| Admin worker contoller APIs
|--------------------------------------------------------------------------
*/


Route::middleware('auth:sanctum')->prefix('admin')->group(function () {

    Route::get('/workers', [AdminWorkerController::class, 'index']);

    Route::get('/workers/{user}', [AdminWorkerController::class, 'show']);

    Route::put('/workers/{user}', [AdminWorkerController::class, 'update']);

    Route::delete('/workers/{user}', [AdminWorkerController::class, 'destroy']);

    Route::patch('/workers/{user}/status', [AdminWorkerController::class, 'status']);

    Route::patch('/workers/{user}/verify', [AdminWorkerController::class, 'verify']);

    Route::get('/workers/pending-verification',[AdminWorkerController::class, 'pendingVerification']);

    Route::post('/workers',[AdminWorkerController::class, 'store']);    

});

Route::patch(
    '/admin/workers/{user}/status',
    [AdminWorkerController::class, 'status']
);


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

Route::get(
    '/top-workers',
    [HomeController::class, 'topWorkers']
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
    */


    Route::get(
        '/worker/profile-status',
        [ProfileController::class, 'profileStatus']
    );



    /*
    |--------------------------------------------------------------------------
    | Favourite Workers APIs
    |--------------------------------------------------------------------------
    */

    Route::get('/favorites', [FavoriteWorkerController::class, 'index']);

    Route::post('/favorites/{worker}', [FavoriteWorkerController::class, 'toggle']);

    Route::delete('/favorites/{worker}', [FavoriteWorkerController::class, 'destroy']);

    Route::get('/favorites/check/{worker}', [FavoriteWorkerController::class, 'check']);


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


/*
|--------------------------------------------------------------------------
| Worker Public Profile
|--------------------------------------------------------------------------
*/

Route::middleware('auth:sanctum')->get(
    '/worker/{worker}',
    [HomeController::class, 'worker']
);
