<?php

namespace App\Services;

use App\Constants\UserStatus;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Models\User\User;
use App\Response\DataStatus;
use App\Response\DataFailed;
use App\Response\DataSuccess;
use Illuminate\Support\Facades\Hash;

class ProductApiService
{
    public function index($data): DataStatus
    {
        try {


            //response

            return new DataSuccess(
                resourceData: ProductResource::collection($data),
                message: "user signed in successfully",
            );
        } catch (\Throwable $th) {
            // throw $th;
            return new DataFailed(message: $th->getMessage());
        }
    }

    public function show($data): DataStatus
    {
        try {


            //response

            return new DataSuccess(
                resourceData: ProductResource::make($data),
                message: "product {$data->title} successfully",
            );
        } catch (\Throwable $th) {
            // throw $th;
            return new DataFailed(message: $th->getMessage());
        }
    }
}
