<?php

namespace Tartan\IranianSms;

use Illuminate\Support\ServiceProvider;
use Tartan\IranianSms\Factory;
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

        $this->app->singleton('iranian_sms', function ($app) {
            return new Factory($app);
        });
    }
}
