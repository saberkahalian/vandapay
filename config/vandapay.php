<?php

return [

    /*
    *   VandaPay pinCode
    *
    */

    'pin_api' => env('VANDA_PIN_API', 'Vp_37324fcefe793'),

    
    /*
    *   VandaPay request url
    *
    */

    'request_url' => env('REQUEST_URL', 'https://www.vandapardakht.com/index.php/Request'),

    /*
    *   VandaPay verification url
    *
    */

    'verification_url' => env('VERIFICATION_URL', 'https://www.vandapardakht.com/index.php/Verify'),


    /*
    *   has datatable ? 
    *
    */

    'store_invoice' => env('STORE_INVOICE', true),

    /*
    *   invoice table name
    *
    */

    'invoice_model' => env('INVOICE_MODEL', 'App\\Models\\Invoice'),


];
