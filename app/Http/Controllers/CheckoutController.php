<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;
use PayPalCheckoutSdk\Core\ProductionEnvironment;
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;
use PayPalCheckoutSdk\Orders\OrdersCaptureRequest;
use Symfony\Component\HttpKernel\Exception\HttpException;

class CheckoutController extends Controller
{

    private $mode;
    private $clientId;
    private $clientSecret;
    private $order;
    private $bill;

    public function createOrder(Request $request)
    {

        $user = Auth::user();

        if(count($user->orders) == '0'){
            return redirect()->route('user.home')->with('orderMess','ليس لديك طلبات حاليا  
             ');
         }
 
 
         foreach($user->orders as $ord){
             if($ord->bill != '0'){
                 $this->order = $ord;
         }
     }

     if(!$this->order){
        return redirect()->route('user.home')->with('messageOrder','ليس لديك دفع حاليا !!');
    }

    $name = $user->name;


        // Creating an environment
        
        $client = $this->getClient();
        // create order in the system then


        // Construct a request object and set desired parameters
        // Here, OrdersCreateRequest() creates a POST request to /v2/checkout/orders
        $request = new OrdersCreateRequest();
        $request->prefer('return=representation');  // must I use it  
        $request->body = [
            "intent" => "CAPTURE",
            "purchase_units" => [[
                "reference_id" => "20201208",
                "amount" => [
                    "value" => $this->order->bill,
                    "currency_code" => "USD"
                ]
            ]],
            "application_context" => [
                "cancel_url" => URL::route('paypal.cancel'), // i used URL to return all link
                "return_url" => URL::route('paypal.return'),
            ]
        ];

        try {
            // Call API with your client and get a response for your call
            $response = $client->execute($request);

            if ($response->statusCode == 201) {

                session()->put('paypal_order_id',$response->result->id);

                foreach ($response->result->links as $link) {
                    if ($link->rel == 'approve') {

                        return redirect()->away($link->href);
                    }
                }
            }

            // If call returns body in response, you can get the deserialized version from the result attribute of the response
            //print_r($response); // print $response
        } catch (HttpException $ex) {
            echo $ex->statusCode;
            print_r($ex->getMessage());
        }
    }

    public function paypalReturn(Request $request)
    {
        $user = Auth::user();


        //return array_sum( array($a));

        if(count($user->orders) == '0'){
            return redirect()->route('user.home')->with('orderMess','ليس لديك طلبات حاليا  
            ');
        }


        foreach($user->orders as $ord){
            if($ord->bill != '0'){
                $this->order = $ord;
        }
    }

     $this->bill = $this->order->bill;

        if(empty($request->input('PayerID')) || empty($request->input('token'))){
            die('Payment Filed');
        }
        
        // Here, OrdersCaptureRequest() creates a POST request to /v2/checkout/orders
        // $response->result->id gives the orderId of the order created above
        $client = $this->getClient();
        $request = new OrdersCaptureRequest(session()->get('paypal_order_id'));
        $request->prefer('return=representation');
        try {
            // Call API with your client and get a response for your call
            $response = $client->execute($request);

            // If call returns body in response, you can get the deserialized version from the result attribute of the response

            session()->forget('paypal_order_id');

            if($response->result->status == 'COMPLETED'){

                $this->order->update([
                    'payments' => $this->order->getOriginal('payments') +  $this->bill,
                ]);
    
                $this->order->update([
                    'bill' => 0,
                ]);
    
                if($this->order->payments == $this->order->orderpriceOrder){
                    $this->order->update([
                        'status' => 'مكتمل',
                    ]); 
                }
    
    
                $a = $user->orders()->sum('payments');
    
                User::where('id',$user->id)->update([
                    'allPaymentsOnSite' => $a,
                ]);

                return redirect()->route('user.home')->with('sacssesChechout','تمت عملية الدفع بنجاح نشكرك على ثقتك بنا');
            }

            return redirect()->route('user.home')->withErrors('ErrorChechout','فشلة عملية الدفع يرجا المحاولة لاحقا');

        } catch (HttpException $ex) {
            echo $ex->statusCode;
            print_r($ex->getMessage());
        }
    }

    public function paypalCancel()
    {

        dd(request()->all());
    }

private function getClient(){
        $this->clientId = config('paypal.sandbox_client_id');
        $this->clientSecret = config('paypal.sandbox_secret');
        $environment = new SandboxEnvironment($this->clientId, $this->clientSecret); // if sandbox must change ProductionEnvironment to SandboxEnvironment;
        $client = new PayPalHttpClient($environment);

        return  $client;

}
}
