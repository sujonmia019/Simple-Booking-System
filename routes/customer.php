<?php

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

Route::middleware(['auth', 'role:customer'])->prefix('portal')->name('customer.')->group(function () {
    Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');
});
