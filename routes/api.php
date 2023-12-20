<?php

use App\Http\Controllers\Api\Auth\SignInApiController;
use App\Http\Controllers\Api\Auth\SignUPApiController;
use App\Http\Controllers\Api\CartApiController;
// use App\Http\Controllers\Api\MyFatoorahApiController;
use App\Http\Controllers\Api\OrderApiController;
use App\Http\Controllers\Api\ProductApiController;
use Fatoorahpayment\Gatewayintegration\MyFatoorahApiController;
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
Route::get('invalide_token', function () {
    return response()->json(['message' => 'Invalide token'], 401);
})->name('invalide_token');
Route::post('signIn', [SignInApiController::class, 'signIn']);
Route::post('signUp', [SignUPApiController::class, 'signUp']);

Route::controller(ProductApiController::class)->group(function () {
    Route::get('products', 'index');
    Route::get('products/{product}', 'show');
});

Route::controller(CartApiController::class)->middleware('auth:api')->group(function () {
    Route::post('add_to_cart', 'add_to_cart');
    Route::post('delete_from_cart', 'delete_from_cart');
    Route::post('increment', 'increment');
    Route::post('decrement', 'decrement');
});

Route::controller(OrderApiController::class)->middleware('auth:api')->group(function () {
    Route::post('create_order', 'create_order');
});



