<?php

use App\Http\Controllers\Customer\AuthController;
use App\Http\Controllers\Customer\BookingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer\DashboardController;

/*
|--------------------------------------------------------------------------
| Customer Routes
|--------------------------------------------------------------------------
|
| Here is where you can register customer routes for your customer user. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Signin or SignUp Routes
Route::view('signin','auth.signin');
Route::view('signup','auth.signup');

Route::middleware(['auth', 'role:customer'])->prefix('portal')->name('customer.')->group(function () {
    Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');

    // Booking Routes
    Route::post('book-now', [BookingController::class, 'bookNow'])->name('book-now');
});
