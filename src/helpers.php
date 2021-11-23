<?php

use Saber\Vandapay\Vandapay;

if (! function_exists('vandapay')) {
    function vandapay(): Vandapay
    {
        return new Vandapay();
    }
}
