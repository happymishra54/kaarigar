<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// Main Controller
use App\Http\Controllers\DashboardController;
// Auth Controllers
use App\Http\Controllers\Auth\AuthenticatedSessionController;

// role controller 
use App\Http\Controllers\RoleController;

// User Controllers
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\ServiceController;
use App\Http\Controllers\User\BookingController;
use App\Http\Controllers\User\ProfileController as CustomerProfileController;

// Worker Controllers
use App\Http\Controllers\Worker\DashboardController as WorkerDashboardController;
use App\Http\Controllers\Worker\ServiceController as WorkerServiceController;
use App\Http\Controllers\Worker\BookingController as WorkerBookingController;
use App\Http\Controllers\Worker\ProfileController;

// Admin Controllers
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BookingController as AdminBookingController;
use App\Http\Controllers\Admin\WorkerVerificationController;
use App\Http\Controllers\Admin\WorkerController;

// Review Controller
use App\Http\Controllers\User\ReviewController;

// Notifications routes

use App\Http\Controllers\NotificationController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

// Route::get('/', [HomeController::class, 'index']);
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get(
    '/services/{slug}',
    [ServiceController::class, 'show']
)->name('service.show');


/*
|--------------------------------------------------------------------------
| Dashboard Redirect
|--------------------------------------------------------------------------
*/

// Route::middleware('auth')->get(
//     '/dashboard',
//     [DashboardController::class, 'index']
// )->name('dashboard');




/*
|--------------------------------------------------------------------------
| Customer Routes
|--------------------------------------------------------------------------
*/

Route::middleware([
    'auth',
    'role:customer'
])->prefix('customer')->group(function () {


    Route::post(
        '/favorite/{worker}',
        [App\Http\Controllers\User\FavoriteController::class, 'toggle']
    )->name('favorite.toggle');
    
    Route::get(
        '/favorites',
        [App\Http\Controllers\User\FavoriteController::class, 'index']
    )->name('customer.favorites');


    Route::get(
        '/review/{booking}',
        [ReviewController::class, 'create']
    )->name('review.create');

    Route::post(
        '/review/store',
        [ReviewController::class, 'store']
    )->name('review.store');



    Route::get(
        '/dashboard',
        [App\Http\Controllers\User\CustomerDashboardController::class, 'index']
    )->name('customer.dashboard');

    Route::get(
        '/booking/{service}',
        [BookingController::class, 'create']
    )->name('booking.create');

    Route::post(
        '/booking/store',
        [BookingController::class, 'store']
    )->name('booking.store');

    Route::get(
        '/bookings',
        [BookingController::class, 'index']
    )->name('customer.bookings');

    Route::get(
        '/booking/{booking}',
        [BookingController::class, 'show']
    )->name('booking.show');

    Route::patch(
        '/booking/{booking}/cancel',
        [BookingController::class,'cancel']
    )->name('booking.cancel');

    Route::get(
        '/customer/profile',
        [CustomerProfileController::class,'index']
    )->name('customer.profile');
    
    Route::get(
        '/customer/profile/edit',
        [CustomerProfileController::class,'edit']
    )->name('customer.profile.edit');
    
    
    Route::put(
        '/profile/update',
        [App\Http\Controllers\User\ProfileController::class, 'update']
    )->name('customer.profile.update');

    Route::get(
        '/nearby-workers',
        [App\Http\Controllers\User\NearbyWorkerController::class, 'index']
    )->name('nearby.workers');

});


/*
|--------------------------------------------------------------------------
| Worker Routes
|--------------------------------------------------------------------------
*/

Route::middleware([
    'auth',
    'role:worker'
])->prefix('worker')->group(function () {

    Route::get(
        '/dashboard',
        [WorkerDashboardController::class, 'index']
    )->name('worker.dashboard');


    // Services

    Route::resource(
        'services',
        WorkerServiceController::class
    );


    // Bookings

    Route::get(
        '/bookings',
        [WorkerBookingController::class, 'index']
    )->name('worker.bookings');

    Route::patch(
        '/booking/{booking}/accept',
        [WorkerBookingController::class, 'accept']
    )->name('worker.booking.accept');

    Route::get(
        '/booking/{booking}',
        [WorkerBookingController::class, 'show']
    )->name('worker.booking.show');

    Route::patch(
        '/booking/{booking}/reject',
        [WorkerBookingController::class, 'reject']
    )->name('worker.booking.reject');

    Route::patch(
        '/booking/{booking}/complete',
        [WorkerBookingController::class, 'complete']
    )->name('worker.booking.complete');


    Route::patch(
        '/worker/booking/{booking}/start',
        [WorkerBookingController::class, 'start']
    )->name('worker.booking.start');




    // Profile

    Route::get(
        '/profile',
        [ProfileController::class, 'index']
    )->name('worker.profile');

    Route::post(
        '/profile/store',
        [ProfileController::class, 'store']
    )->name('worker.profile.store');

    Route::get(
        '/profile/edit',
        [ProfileController::class, 'edit']
    )->name('worker.profile.edit');

    // Route::put(
    //     '/profile/update',
    //     [ProfileController::class, 'update']
    // )->name('worker.profile.update');


    Route::match(
        ['GET','POST','PUT'],
        '/profile/update',
        [ProfileController::class, 'update']
    )->name('worker.profile.update');


    Route::delete(
        '/profile/delete',
        [ProfileController::class, 'destroy']
    )->name('worker.profile.delete');


    



});


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::get(
    '/admin/login',
    [AuthenticatedSessionController::class,'create']
)->name('admin.login');

Route::middleware([
    'auth',
    'role:admin'
])->prefix('admin')->group(function () {

    Route::get(
        '/dashboard',
        [AdminDashboardController::class, 'index']
    )->name('admin.dashboard');

    Route::get(
        '/users',
        [UserController::class, 'index']
    )->name('admin.users');

    Route::patch(
        '/users/{user}/status',
        [UserController::class, 'toggleStatus']
    )->name('admin.users.status');

    Route::delete(
        '/users/{user}',
        [UserController::class, 'destroy']
    )->name('admin.users.destroy');

    Route::resource(
        'categories',
        CategoryController::class
    );

    Route::get(
        '/bookings',
        [AdminBookingController::class, 'index']
    )->name('admin.bookings');

    Route::patch(
        '/bookings/{booking}/cancel',
        [AdminBookingController::class, 'cancel']
    )->name('admin.booking.cancel');

    Route::get(
        '/worker-verifications',
        [WorkerVerificationController::class, 'index']
    )->name('admin.worker.verifications');

    Route::patch(
        '/worker-verifications/{worker}',
        [WorkerVerificationController::class, 'approve']
    )->name('admin.worker.approve');

    Route::get(
        '/workers/create',
        [WorkerController::class,'create']
    )->name('admin.workers.create');
    
    Route::post(
        '/workers/store',
        [WorkerController::class,'store']
    )->name('admin.workers.store');

     Route::delete(
        '/workers/{worker}',
        [WorkerController::class,'destroy']
    )->name('admin.workers.destroy');

    Route::get(
        '/workers',
        [WorkerController::class,'index']
    )->name('admin.workers.index');

});



//location search route//

Route::post(
    '/set-location',
    function(Request $request){
        
        session([
            'city'=>$request->city
        ]);
        
        return response()->json([
            'success'=>true
        ]);
        
    }
    
);
/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/

// Route::view('/login', 'auth.otp-login')
// ->name('login');



Route::post(
'/firebase-login',
[AuthenticatedSessionController::class, 'firebaseLogin']
);


// notification routes

Route::middleware('auth')->group(function () {

    Route::get(

        '/notifications',

        [NotificationController::class,'index']

    )->name('notifications');

    Route::patch(

        '/notifications/{id}',

        [NotificationController::class,'read']

    )->name('notifications.read');

});


// role based login route

Route::middleware('auth')->get(
    '/select-role',
    function () {
        return view('auth.select-role');
    }
);

// choose role route

Route::middleware('auth')->get(
    '/choose-mode',
    function () {
        return view('auth.choose-mode');
    }
)->name('choose.mode');


// role selection route
Route::middleware('auth')->group(function () {

    Route::post(
        '/become-customer',
        [RoleController::class, 'becomeCustomer']
    )->name('become.customer');

    Route::post(
        '/become-worker',
        [RoleController::class, 'becomeWorker']
    )->name('become.worker');

});

// otp login route

// Route::view('/login', 'auth.otp-login')
//     ->name('otp.login');


Route::get(
    '/worker/{worker}',
    [HomeController::class, 'workerProfile']
)->name('worker.show');

require __DIR__.'/auth.php';
