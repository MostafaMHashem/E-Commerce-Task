<?php

use App\Http\Controllers\Dashboard\Auth\SignInDashboardController;
use App\Http\Controllers\Dashboard\Auth\SignoutDashboardController;
use App\Http\Controllers\Dashboard\OrderController;
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


Route::prefix('admin')->middleware('guest:admin')->name('admin.')->group(function () {
    Route::controller(SignInDashboardController::class)->name('auth.')->group(function () {
        Route::get('signIn', 'signIn')->name('signIn');
        Route::post('postSignIn', 'postSignIn')->name('signIn.post');
    });
});

Route::prefix('admin')->middleware('auth:admin')->name('admin.')->group(function () {
    Route::get('signOut', [SignoutDashboardController::class, 'signOut'])->name('auth.signOut');
    Route::controller(OrderController::class)->name('orders.')->group(function () {
        Route::get('orders', 'index')->name('index');
    });
});
