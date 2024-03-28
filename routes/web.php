<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index']);

Route::resource('/clients', \App\Http\Controllers\ClientController::class);
Route::resource('/payments', \App\Http\Controllers\PaymentController::class);
Route::resource('/debts', \App\Http\Controllers\DebtController::class);
