<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Services\ProductApiService;

class ProductApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $service = new ProductApiService();
        return $service->index(Product::all())->response();
    }




    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $service = new ProductApiService();
        return $service->show($product)->response();
    }

}
