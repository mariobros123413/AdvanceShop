<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class PagoController extends Controller
{
    // public function pay(Request $request){
    //     $service = config("services.PayPal.class");
    //     return resolve($service);
    //     // return handlePayment($request);
    // }
    public function __construct()
    {
        $paypalconfig = Config::get('paypal');
        $apiContext = new \PayPal\Rest\ApiContext();
    }
}
