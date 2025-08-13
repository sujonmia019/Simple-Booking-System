<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes([
    'register',         // 404 Disabled
    'password.request', // 404 Disabled
    'password.confirm', // 404 Disabled
    'password.email', // 404 Disabled
    'password.reset', // 404 Disabled
    'password.update'  // 404 Disabled
]);

// Admin Group Routes
Route::middleware(['auth', 'role:admin'])->name('app.')->group(function () {
    Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');

    // Customer Routes
    Route::resource('customers', CustomerController::class)->except('create','store');

    // Service Routes
    Route::resource('services', ServiceController::class)->except('show');

});



