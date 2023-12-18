<?php
 
use App\Services\FatoorahServices;
class FatoorahController  {

    public function checkout(Request $request)
    {

        /********
         * 
         *  Here, write the code to save the order, add the products to it, and calculate the total price
         * 
         * 
         ********/

        $fatoorahServices = new FatoorahServices();
        $payment = new OrderPayment();
       
        $data = [
            "CustomerName" => 'customer_name',
             "Notificationoption"=> "LNK",  
            "Invoicevalue" =>$price,// total_price
            "CustomerEmail" => 'customer_email',     
            "CalLBackUrl"=>'https://domain.com/callback',
            "Errorurl"=> 'https://domain.com/error',  
            "Languagn"=> 'en',
            "DisplayCurrencyIna"=>'SAR'
        ];
        $response = $fatoorahServices->sendPayment($data);
        
        if(isset($response['IsSuccess']))
        if($response['IsSuccess']==true){

            $InvoiceId  = $response['Data']['InvoiceId']  ; // save this id with your order table 
            $InvoiceURL = $response['Data']['InvoiceURL'] ;
              
        }
            return redirect($response['Data']['InvoiceURL']);// redirect for this link to view payment page
     }



    
    public function callback(Request $request)
    {
        $apiKey = 'your_token';
        $postFields = [
            'Key'     => $request->paymentId,
            'KeyType' => 'paymentId'
            ];
            $response = $fatoorahServices->callAPI("https://apitest.myfatoorah.com/v2/getPaymentStatus", $apiKey, $postFields);
            $response = json_decode($response);
            if(!isset($response->Data->InvoiceId))
                return response()->json(["error" => 'error','status' =>false],404);
                $InvoiceId =  $response->Data->InvoiceId  ;// get your order by payment_id
                if($response->IsSuccess==true){
                    if($response->Data->InvoiceStatus=="Paid")//||$response->Data->InvoiceStatus=='Pending'
                    if( $your_order_total_price==$response->Data->InvoiceValue){

                    /**
                     * 
                     * The payment has been completed successfully. You can change the status of the order
                     * 
                     */

                    }
                }

                return response()->json(["error" => 'error','status' =>false],404);
    }


       

}
