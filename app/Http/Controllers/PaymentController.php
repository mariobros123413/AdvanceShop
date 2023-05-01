<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Amount;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;

class PaymentController extends Controller
{
    private $apiContext;
    public function __construct()
    {
        $paypalConfig = Config::get('paypal');
        $this->apiContext = new ApiContext(
            new OAuthTokenCredential(
                'AbeMslKVUFU1u7IhHKO06EHbe8DkhGdg-9CLAF8VBZ2i9yNjwFmCicGa5-ehRmOiDnhd4P_jXsCZSs8D',
                'EN6wQS9BHfI_KGs4i5PYYOHwhzsRKgTTls76-5a3gpboCI67UDmlm_cixCDhC0XJ8KB7q30H3mAwjDKU'
            )
        );
        // $this->apiContext->setConfig($payPalConfig['settings']);

    }

    public function payWithPaypal(Request $request)
    {$total = $request->input('total');
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $amount = new Amount();

        $value = (float) $total;


        // $numero_flotante = floatval($total);
        // $numero_decimal = number_format($total,2,'.','');

        $amount->setTotal($value);
        $amount->setCurrency('USD');

        

        $transaction = new Transaction();
        $transaction->setAmount($amount);

        $callbackUrl = url('status');
        // $returnUrl = url('welcome');
        // $cancelUrl = url('carrito');


        $redirectUrls = new RedirectUrls();

        $redirectUrls->setReturnUrl($callbackUrl)
            ->setCancelUrl($callbackUrl);

        $payment = new Payment();
        $payment->setIntent('sale')
            ->setPayer($payer)
            ->setTransactions(array($transaction))
            ->setRedirectUrls($redirectUrls);


            try {
                $payment->create($this->apiContext);
                //echo $payment;
                return redirect()->away($payment->getApprovalLink());
            }
            catch (PayPalConnectionException $ex) {
                // This will print the detailed information on the exception.
                //REALLY HELPFUL FOR DEBUGGING
                echo $ex->getData();
            }   
    }

    public function payPalStatus(Request $request){
        $paymentId = $request->input('paymentId');
        $payerId = $request->input('PayerID');
        $token = $request->input('token');

        if (!$paymentId || !$payerId || !$token) {
            $status = 'Lo sentimos! El pago a través de PayPal no se pudo realizar.';
            return redirect('/carrito')->with(compact('status'));
        }

        $payment = Payment::get($paymentId, $this->apiContext);

        $execution = new PaymentExecution();
        $execution->setPayerId($payerId);

        /** Execute the payment **/
        $result = $payment->execute($execution, $this->apiContext);

        if ($result->getState() === 'approved') {
            $status = 'Gracias! El pago a través de PayPal se ha ralizado correctamente.';
            return redirect()->route('carrito.ecarrito', compact('status'));
        }

        $status = 'Lo sentimos! El pago a través de PayPal no se pudo realizar.';
        return redirect()->route('carrito.ecarrito', compact('status'));
    }
}
