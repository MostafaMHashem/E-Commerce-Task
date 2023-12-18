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

use App\Services\FatoorahServices;
use Illuminate\Http\Request;

class OrderApiService
{
    private $fatoorahServices;
    public User $auth_user;

    // public function __construct(User $user)
    // {
    //     $this->auth_user = $user;
    //     // $this->fatoorahServices = $this->fatoorahServices();
    // }

    // protected function fatoorahServices()
    // {
    //     return $fatoorahServices = new FatoorahServices(User::find(auth('api')->id()));
    // }

    public function create_order(): DataStatus
    {
        try {
            $this->auth_user->find(auth('api')->id());
            DB::beginTransaction();

            if ($this->auth_user->carts->count() == 0) {
                return new DataFailed(message: "you have no products selected yet , go and select the products you prefer to your cart");
            }
            $order = Order::create([
                'user_id' => auth('api')->id(),
            ]);

            $product_ids = $this->auth_user->carts->pluck('product_id')->toArray();
            $order->products()->attach($product_ids, ['user_id' => auth('api')->id()]);
            $order->update([
                'total_price' => $this->auth_user->carts->sum('price'),

            ]);
            $this->auth_user->carts()->delete();


            DB::commit();

            //response
            return new DataSuccess(
                // route:
                data: $order,
                resourceData: orderResource::make($order),
                message: "order created successfully successfully",
            );
        } catch (\Throwable $th) {
            // throw $th;
            return new DataFailed(message: $th->getMessage());
        }
    }



    public function payment_data()
    {

        $order = $this->create_order();

        /** for myfatoorah payment method */
        $payment_data_submit = [
            "CustomerName" => $this->auth_user->name,
            "InvoiceValue" =>   $order->getData()['data']['total_price'],
            "CustomerMobile" => $this->auth_user->phone,
            "CustomerEmail" =>  $this->auth_user->email,
            "CallBackUrl" => "https://yoursite.com/success",
            "ErrorUrl" => "https://yoursite.com/error",
            "Language" => "ar",
            "DisplayCurrencyIso" => config('myfatoorah.country_iso'),
            "MobileCountryCode" => "965",
        ];

        return $payment_data_submit;


        /** End of myfatoorah */
    }

    public function response_from_myfatoorah($response)
    {

        // $response = $data;//$this->fatoorahServices->sendPayment($this->payment_data());

        if (isset($response['IsSuccess']))
            if ($response['IsSuccess'] == true) {

                $InvoiceId  = $response['Data']['InvoiceId']; // save this id with your order table
                $InvoiceURL = $response['Data']['InvoiceURL'];
            }

        return redirect($response['Data']['InvoiceURL']); // redirect for this link to view payment page

    }
}//End of class
