<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Auth\AuthController;
use App\Http\Controllers\API\Customer\ServiceController;
use App\Http\Controllers\API\Customer\BookingController;

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
    // Customer Service List Route
    Route::get('services', [ServiceController::class, 'serviceList']);
    // Customer New Booking Route
    Route::post('bookings', [BookingController::class, 'addBooking']);
    // Customer Booking List Route
    Route::get('bookings', [BookingController::class, 'bookingList']);

});
