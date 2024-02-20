<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    private $gateway;

    public function __construct(){
        $this->gateway = Omnipay::create('Paypal_Rest');
        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET'));
        $this->gateway->setTestMode(true);

    }

    public function pay(Request $request)
    {
        try{
            $response = $this->gateway->purchase (array(
                'price' => $request->price, 
                'currency' => env('PAYPAL_CURRENCY'),
                'returnUrl' => url('success'),
                'cancelUrl' => url('error')
            ))->send();

            if ($response->isRedirect()) {
                $response->redirect();
            }

        } catch (\Throwable $th) {
            return $th->getMessage();
        }    
    }

    public function success(Request $request) 
    {
        if ($request->input('id') && $request->input('user_id')) {
            $transaction = $this->gateway->completePurchase(array(
                'user_id' => $request->input('user_id'),
                'transactionReference' => $request->input('id')
            ));

            $response = $transaction->send();

            if ($response->isSuccessful()) {
                $arr = $response->getData();

                $payment = new Payment();
                $payment->id = $arr['id'];
                $payment->user_id = $arr['user']['user_id'];
                $payment->email = $arr['user']['email'];
                $payment->price = $arr['transaction'][0]['price'];
                $payment->currency = env('PAYPAL_CURRENCY');
                $payment->payment_completed = $arr['state'];

                $payment->save();

                return "Payment Successful: Your transaction id is " .$arr['id'];
            }
            else {
                return $response->getMessage();
            }
        }
        else {
            return 'Payment Declined';
        }
        
    }

    public function error() 
    {
        return 'User Declined the payment';
        
    }
}
