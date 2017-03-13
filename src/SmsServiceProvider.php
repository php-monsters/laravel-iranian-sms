<?php

namespace Keraken\Iraniansms;

use Illuminate\Support\ServiceProvider;
use Keraken\Iraniansms\Factory;
class SmsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {

        $this->publishes([
        __DIR__.'/../config/iranian_sms.php' => config_path('iranian_sms.php')
            ], 'config');
    }

    /**
     * Register the application services.
     */
    public function register()
    {

        $this->app->singleton('iraniansms', function ($app) {
            return new Factory($app);
        });
    }
}
