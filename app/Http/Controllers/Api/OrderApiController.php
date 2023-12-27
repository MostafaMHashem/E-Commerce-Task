<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Services\OrderApiService;
use Illuminate\Http\Request;

class OrderApiController extends Controller
{
    public function create_order(Request $request)
    {
        // return auth()->user()->carts()->pluck('product_id');

        $service = new OrderApiService();
        return $service->create_order()->response();
    }


}
