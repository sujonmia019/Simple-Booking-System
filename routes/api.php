<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Auth\AuthController;
use App\Http\Controllers\API\Customer\ServiceController;
use App\Http\Controllers\API\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\API\Customer\BookingController;
use App\Http\Controllers\API\Admin\BookingController as AdminBookingController;

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

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::prefix('v1')->middleware(['auth:sanctum'])->group(function() {
    // Logout Route
    Route::post('logout', [AuthController::class, 'logout']);

    // Customer Routes
    Route::prefix('customer')->group(function(){
        // Service List
        Route::get('services', [ServiceController::class, 'serviceList']);
        // New Booking
        Route::post('bookings', [BookingController::class, 'addBooking']);
        // Booking List
        Route::get('bookings', [BookingController::class, 'bookingList']);
    });

    // Admin Routes
    Route::prefix('admin')->group(function(){
        // Service Route
        Route::post('services', [AdminServiceController::class, 'store']);
        Route::put('services/{id}', [AdminServiceController::class, 'update']);
        Route::delete('services/{id}', [AdminServiceController::class, 'destroy']);
        Route::get('bookings', [AdminBookingController::class, 'index']);
    });

});
