<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Cart\AddDeleteCartApiRequest;
use App\Http\Requests\Api\Cart\IncrementDecrementCartApiRequest;
use App\Services\CartApiService;

class CartApiController extends Controller
{
    public function add_to_cart(AddDeleteCartApiRequest $request)
    {
        $validated_data = $request->validated();
        $service = new CartApiService();
        return $service->add_to_cart($validated_data)->response();
    }


    public function delete_from_cart(AddDeleteCartApiRequest $request)
    {
        $validated_data = $request->validated();
        $service = new CartApiService();
        return $service->delete_from_cart($validated_data)->response();
    }

    public function increments(IncrementDecrementCartApiRequest $request)
    {
        $validated_data = $request->validated();
        $service = new CartApiService();
        return $service->increments($validated_data)->response();
    }

    public function decrement(IncrementDecrementCartApiRequest $request)
    {
        $validated_data = $request->validated();
        $service = new CartApiService();
        return $service->decrement($validated_data)->response();
    }

    // public function confirm_and_add_order(ConfirmOrderApiRequest $request)
    // {
    //     $validated_data = $request->validated();
    //     $service = new CartApiService();
    //     return $service->decrement($validated_data)->response();
    // }
}
