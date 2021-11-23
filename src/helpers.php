<?php

use Saber\VandaPay\Vandapay;

if (! function_exists('vandapay')) {
    function vandapay(): Vandapay
    {
        return new Vandapay();
    }
}
