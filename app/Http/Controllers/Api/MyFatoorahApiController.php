<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Cart\AddOrderApiRequest;
use App\Services\FatoorahServices;
use App\Services\OrderApiService;
use Illuminate\Http\Request;

class MyFatoorahApiController extends Controller
{

    public function initial_data(Request $request)
    {
        /** still need to handle the request  */
        $data = [
            "InvoiceAmount" =>  $request->InvoiceAmount,
            "CurrencyIso" => $request->CurrencyIso
        ];
        $fatoorahServices = new FatoorahServices();
        $response = $fatoorahServices->initial_data($data);
        return $response;
    }


    public function execute_payment(Request $request)
    {
        /** still need to handle the request  */
        $fatoorahServices = new FatoorahServices();
        $response = $fatoorahServices->execute_payment($request);
        return $response;
    }

    public function error_page(Request $request){
        return view('myfatoorah.error');
    }
    public function sucess_page(Request $request){
        dd($request->all());
        return view('myfatoorah.success');
    }
}
