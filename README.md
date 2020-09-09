# Laravel SMS Component
Laravel Package for dealing with Iranian SMS providers working with Laravel 5+
Support multiple config for each provider

## Installation

1.Installing Via composer
```bash
composer require tartan/laravel-iranian-sms
```

2.Add this to your app service providers :
```php
    Tartan\IranianSms\SmsServiceProvider::class,
```

3.Add this to your aliases :
```php
    'IranianSms' => Tartan\IranianSms\Facades\IranianSms::class
```

4.Publish the config file
```bash
php artisan vendor:publish --provider="Tartan\IranianSms\SmsServiceProvider" --tag=config
```


## Usage Example :
```php
    //using the default adapter
    resolve('iraniansms')->make()->send('0912xxxxxxx','this is test message');

    //using kavenegar adapter with default config
    resolve('iraniansms')->make('kavenegar')->send('0912xxxxxxx','this is test message');

    //using kavenegar adapter with sender2 config
    resolve('iraniansms')->make('kavenegar', 'sender2')->send('0912xxxxxxx','this is test message');

    //using Facede
    use Iraniansms;
    Iraniansms::make()->send('0912xxxxxxx','this is test message');
```


### available adapters
* log (no charge adapter for development purposes)
* slack (no charge adapter for development and staging environment)
* discord (no charge adapter for development and staging environment)
* mehrafraz مهر افراز
* kavenegar کاوه نگار
* smsir اسمس آی آر
* ghasedak قاصدک
* parsasms پارسا اسمس



## Example config:

```php
<?php

return [
	//Default SMS gateway
	'default' => env('IRANIANSMS_DEFAULT','log'),
	'mehrafraz' => [
		'gateway' => env('IRANIANSMS_MEHRAFRAZ_GATEWAY','http://mehrafraz.com/webservice/Service.asmx?WSDL'),
		'username' => env('IRANIANSMS_MEHRAFRAZ_USERNAME'),
		'password' => env('IRANIANSMS_MEHRAFRAZ_PASSWORD'),
	],
	'kavenegar' => [
		'gateway' => env('IRANIANSMS_KAVENEGAR_GATEWAY','http://api.kavenegar.com/v1/%s/%s/%s.json/'),
		'api_key' => env('IRANIANSMS_KAVENEGAR_APIKEY'),
		'sender' => env('IRANIANSMS_KAVENEGAR_SENDER'),
        'sender2' => [
            'gateway' => env('IRANIANSMS_KAVENEGAR_SENDER2_GATEWAY','http://api.kavenegar.com/v1/%s/%s/%s.json/'),
		    'api_key' => env('IRANIANSMS_KAVENEGAR_SENDER2_APIKEY'),
		    'sender' => env('IRANIANSMS_KAVENEGAR_SENDER2_SENDER'),
        ],       
	],
	'smsir' => [
		'gateway' => env('IRANIANSMS_SMSIR_GATEWAY', 'http://ip.sms.ir/SendMessage.ashx'),
		'user' => env('IRANIANSMS_SMSIR_USER'),
		'pass'  => env('IRANIANSMS_SMSIR_PASS'),
		'line_no'  => env('IRANIANSMS_SMSIR_LINENO'),
	],
	'ghasedak'=> [
		'api_key' => env('IRANIANSMS_GHASEDAK_APIKEY'),
		'sender'  => env('IRANIANSMS_GHASEDAK_SENDER'),
	],

    'parsasms' => [
        'gateway' => env('IRANIANSMS_PARSASMS_GATEWAY','http://api.parsasms.com/v2/sms/send/simple'),
        'api_key' => env('IRANIANSMS_PARSASMS_APIKEY'),
        'sender' => env('IRANIANSMS_PARSASMS_SENDER')
    ],

    'slack' => [
        'url' => env('IRANIANSMS_SLACK_URL')
    ],

    'discord' => [
        'url' => env('IRANIANSMS_DISCORD_URL')
    ],
];
```
