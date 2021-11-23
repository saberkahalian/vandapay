<?php

use Saber\VandaPay\VandaPay;

if (! function_exists('vandapay')) {
    function vandapay(): Vandapay
    {
        return new Vandapay();
    }
}
