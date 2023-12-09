<?php

namespace App\Services;

use App\Constants\UserStatus;
use App\Http\Resources\orderResource;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\User\User;
use App\Response\DataStatus;
use App\Response\DataFailed;
use App\Response\DataSuccess;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class OrderApiService
{
    public function create_order(): DataStatus
    {
        try {
            $auth_user = User::find(auth('api')->id());
            DB::beginTransaction();

            $order = Order::create([
                'user_id' => auth('api')->id(),
            ]);

            $product_ids = $auth_user->carts->pluck('product_id')->toArray();
            $order->products()->attach($product_ids);
            $order->update([
                'price_before' => $auth_user->carts->sum('price'),
            ]);
            $auth_user->carts()->delete();

            DB::commit();

            //response
            return new DataSuccess(
                resourceData: orderResource::make($order),
                message: "order created successfully successfully",
            );
        } catch (\Throwable $th) {
            // throw $th;
            return new DataFailed(message: $th->getMessage());
        }
    }
}//End of class
