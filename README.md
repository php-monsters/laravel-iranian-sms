# Laravel SMS Component
Laravel Package for dealing with Iranian SMS prodivers working with Laravel 5 & 6

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
    resolve('iraniansms')->make()->send('0912xxxxxxx','test2x');

    //using kavenegar adapter
    resolve('iraniansms')->make('kavenegar')->send('0912xxxxxxx','test2x');


    //using Facede
    use Iraniansms;
    Iraniansms::make()->send('0912xxxxxxx','test2x');
```


### available adapters
* log (no charge adapter for development purposes)
* slack (no charge adapter for development and staging environment)
* mehrafraz مهر افراز
* kavenegar کاوه نگار
* smsir اسمس آی آر
* ghasedak قاصدک



## Example config:

```php
<?php

return [
	//Default SMS gateway
	'default' => env('IRANIANSMS_DEFAULT','log'),
	'mehrafraz' => [
		'gateway' => env('IRANIANSMS_MEHRAFRAZ_GATEWAY','http://mehrafraz.com/webservice/Service.asmx?WSDL'),
		'username' => env('IRANIANSMS_MEHRAFRAZ_USERNAME','test'),
		'password' => env('IRANIANSMS_MEHRAFRAZ_PASSWORD','test'),
	],
	'kavenegar' => [
		'gateway' => env('IRANIANSMS_KAVENEGAR_GATEWAY','http://api.kavenegar.com/v1/%s/%s/%s.json/'),
		'api_key' => env('IRANIANSMS_KAVENEGAR_APIKEY','test'),
		'sender' => env('IRANIANSMS_KAVENEGAR_SENDER','test'),
	],
	'smsir' => [
		'gateway' => env('IRANIANSMS_SMSIR_GATEWAY', 'http://ip.sms.ir/SendMessage.ashx'),
		'user' => env('IRANIANSMS_SMSIR_USER', 'test'),
		'pass'  => env('IRANIANSMS_SMSIR_PASS', 'test'),
		'line_no'  => env('IRANIANSMS_SMSIR_LINENO', 'test'),
	],
	'ghasedak'=> [
		'api_key' => env('IRANIANSMS_GHASEDAK_APIKEY', 'test'),
		'sender'  => env('IRANIANSMS_GHASEDAK_SENDER', 'test'),
	],

    'slack' => [
        'url' => env('IRANIANSMS_SLACK_URL')
    ],

    'discord' => [
        'url' => env('IRANIANSMS_DISCORD_URL')
    ],

    'parsasms' => [
        'gateway' => env('IRANIANSMS_PARSASMS_GATEWAY','http://api.parsasms.com/v2/sms/send/simple'),
        'api_key' => env('IRANIANSMS_PARSASMS_APIKEY','test'),
        'sender' => env('IRANIANSMS_PARSASMS_SENDER','test')
    ]
];
```
