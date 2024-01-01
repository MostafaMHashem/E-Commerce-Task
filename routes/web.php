<?php

use App\Http\Controllers\Dashboard\WhatsappController;
use App\Http\Controllers\ButtonClickedController;
use App\Http\Controllers\Dashboard\Auth\SignInDashboardController;
use App\Http\Controllers\Dashboard\Auth\SignoutDashboardController;
use App\Http\Controllers\Dashboard\OrderController;
use Fatoorahpayment\Gatewayintegration\TestPackageClass;
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


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::prefix('admin')->middleware('guest:admin')->name('admin.')->group(function () {
    Route::controller(SignInDashboardController::class)->name('auth.')->group(function () {
        Route::get('signIn', 'signIn')->name('signIn');
        Route::post('postSignIn', 'postSignIn')->name('signIn.post');
    });
    Route::controller(WhatsappController::class)->name('scan_whatsapp.')->group(function () {
        Route::get('scan_whatsapp', 'index')->name('index');
    });


});
Route::get('screenshot_session',[WhatsappController::class,'screenshot_session'])->name('screenshot_session');
Route::prefix('admin')->middleware('auth:admin')->name('admin.')->group(function () {
    Route::get('signOut', [SignoutDashboardController::class, 'signOut'])->name('auth.signOut');
    Route::controller(OrderController::class)->name('orders.')->group(function () {
        Route::get('orders', 'index')->name('index');
    });

});


