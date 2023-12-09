<?php

use App\Http\Controllers\Api\Auth\SignInApiController;
use App\Http\Controllers\Api\Auth\SignUPApiController;
use App\Http\Controllers\Api\ProductApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('signIn', [SignInApiController::class, 'signIn']);
Route::post('signUp', [SignUPApiController::class, 'signUp']);

Route::controller(ProductApiController::class)->group(function () {
    Route::get('products', 'index');
    Route::get('products/{product}', 'show');
});

Route::controller(CartApiController::class)->group(function () {
    Route::post('add_to_cart', 'add_to_cart');
    Route::post('delete_from_cart', 'delete_from_cart')->name('delete_from_cart');
    Route::post('increment', 'increments');
    Route::post('decrement', 'decrement');
});

