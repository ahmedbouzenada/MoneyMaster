<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::inertia('/', 'Welcome');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index']);

    Route::resource('/clients', \App\Http\Controllers\ClientController::class);
    Route::resource('/payments', \App\Http\Controllers\PaymentController::class);
    Route::resource('/debts', \App\Http\Controllers\DebtController::class);
});

require __DIR__ . '/auth.php';
