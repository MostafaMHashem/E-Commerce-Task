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

            if($auth_user->carts->count() == 0 ){
                return new DataFailed(message: "you have no products selected yet , go and select the products you prefer to your cart");
            }
            $order = Order::create([
                'user_id' => auth('api')->id(),
            ]);

            $product_ids = $auth_user->carts->pluck('product_id')->toArray();
            $order->products()->attach($product_ids, ['user_id' => auth('api')->id()]);
            $order->update([
                'total_price' => $auth_user->carts->sum('price'),

            ]);
            $auth_user->carts()->delete();

            /** for myfatoorah payment method */
            $payment_data_submit = [
                "CustomerName" => $auth_user->name,
                "InvoiceValue" =>  $order->total_price ?? 100,
                "CustomerMobile" => $auth_user->phone,
                "CustomerEmail" =>  $auth_user->email,
                "CallBackUrl" => "https://yoursite.com/success",
                "ErrorUrl" => "https://yoursite.com/error",
                "Language"=> "ar",
                "DisplayCurrencyIso" => "KWD",
                "MobileCountryCode" => "965",
            ];
            /** End of myfatoorah */

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
