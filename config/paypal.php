<?php

return[
        'client_id'=>env('PAYPAL_CLIENT_ID'),
        'secret' => env('PAYPAL_SECRET'),
        'settings' =>[
            'mode'=>env(key: 'PAYPAL_MODE',default: 'sandbox'),
            'http.ConnectionTimeOut' => 30,
            'log.LogEnabled' => true,
            'log.FileName' => storage_path(path: '/logs/paypal.log'),
            'log.LogLevel' =>'ERROR'
        ]
        // 'class' => App\Http\Services\PayPalService::class,
]

?>