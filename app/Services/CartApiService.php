<?php

namespace App\Services;

use App\Constants\UserStatus;
use App\Http\Resources\CartResource;
use App\Models\Cart;
use App\Models\Product;
use App\Models\User\User;
use App\Response\DataStatus;
use App\Response\DataFailed;
use App\Response\DataSuccess;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CartApiService
{
    public function add_to_cart($data): DataStatus
    {
        try {
            $product = Product::find($data['product_id']);
            $data['cart_id'] = $data['cart_id'] ?? null;
            $data['product_quantity'] = $data['product_quantity'] ?? 1;
            if ($data['cart_id']) {
                $cart = Cart::find($data['cart_id']);

                $cart->updateOrCreate(
                    [
                        'user_id' => auth('api')->id(),
                        'product_id' => $data['product_id'],
                    ],
                    [
                        'product_quantity' => DB::raw('product_quantity + ' . ($data['product_quantity'])),
                    ]
                );
            } else {
                $cart = Cart::create([
                    'user_id' => auth('api')->id(),
                    'product_id' => $data['product_id'],
                    'product_quantity' => $data['product_quantity'] ?? 0,
                    // 'price'
                ]);
            }

            //response

            return new DataSuccess(
                resourceData: CartResource::make($cart),
                message: "add {$product->name} to cart successfully",
            );
        } catch (\Throwable $th) {
            // throw $th;
            return new DataFailed(message: $th->getMessage());
        }
    }

    public function delete_from_cart($data): DataStatus
    {
        try {
            $product = Product::find($data['product_id']);
            $cart = Cart::where('user_id', auth('api')->id())->where('cart_id', $data['cart_id'])->where('product_id', $data['product_id'])->delete();


            //response
            return new DataSuccess(
                message: "delete_from_cart {$product->name}  successfully",
            );
        } catch (\Throwable $th) {
            // throw $th;
            return new DataFailed(message: $th->getMessage());
        }
    }

    public function increments($data): DataStatus
    {
        try {
            $cart = Cart::find($data['cart_id']);
            $product = Product::find($data['product_id']);

            if ($cart->product_quantity == $product->quantity) {
                return new DataFailed(message: "product stock is zero");
            } elseif ($cart->product_quantity + $data['product_quantity'] >= $product->quantity) {
                return new DataFailed(message: "product stock is less than product quantity");
            }

            DB::beginTransaction();

            $cart->update([
                'product_quantity' => DB::raw('product_quantity + ' . $data['product_quantity']),
                // 'price' => DB::raw('price + ' . $data['price']),
            ]);

            DB::commit();

            //response

            return new DataSuccess(
                resourceData: CartResource::make($data),
                message: "Cart increments {$data->title} successfully",
            );
        } catch (\Throwable $th) {
            // throw $th;
            return new DataFailed(message: $th->getMessage());
        }
    }


    public function decrement($data): DataStatus
    {
        try {
            $cart = Cart::find($data['cart_id']);
            if ($cart->product_quantity == 0) {
                return new DataFailed(message: "Cart quantity is zero");
            }

            DB::beginTransaction();

            $cart->update([
                'product_quantity' => DB::raw('product_quantity - ' . $data['product_quantity']),
                // 'price' => DB::raw('price + ' . $data['price']),
            ]);

            DB::commit();
            //response
            return new DataSuccess(
                resourceData: CartResource::make($data),
                message: "Cart increments {$data->title} successfully",
            );
        } catch (\Throwable $th) {
            // throw $th;
            return new DataFailed(message: $th->getMessage());
        }
    }
}
