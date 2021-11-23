<?php

namespace Saber\VandaPay;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    public function boot()
    {
        $this->publishes([__DIR__.'/../config/vandapay.php' => config_path('vandapay.php')], 'config');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/vandapay.php', 'vandapay');
    }
}
