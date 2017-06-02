# Laravel SMS Component


## Installation

1.Installing Via composer
```bash
composer require keraken/laravel-iranian-sms
```

2.Add this to your app service providers :
```php
    Keraken\IranianSms\SmsServiceProvider::class,
```

3.Add this to your aliases :
```php
    'IranianSms' => Keraken\IranianSms\Facades\IranianSms::class
```

4.Publish the config file 
```bash
php artisan vendor:publish --tag=config
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
	* mehrafzar
	* kavenegar



## Example config:

```php
<?php

return [
	//Default SMS gateway
	'default' => env('IRANIANSMS_DEFAULT','mehrafzar'), 
	'mehrafzar' => [
		'gateway' => env('IRANIANSMS_MEHRAFZAR_GATEWAY','http://mehrafraz.com/webservice/Service.asmx?WSDL'),
		'username' => env('IRANIANSMS_MEHRAFZAR_USERNAME','test'),
		'password' => env('IRANIANSMS_MEHRAFZAR_PASSWORD','test'),
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
            'lineNo'  => env('IRANIANSMS_SMSIR_LINENO', 'test'),
        ]
];
```
