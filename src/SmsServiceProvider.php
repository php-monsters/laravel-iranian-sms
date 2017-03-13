<?php

namespace Keraken\IranianSms;

use Illuminate\Support\ServiceProvider;

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
            return new \Keraken\IranianSms\Factory($app);
        });
    }
}
