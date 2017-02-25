# Laravel SMS Component


## Installation 
```
1.composer require iamtartan/laravel-iranian-sms
```bash

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
php artisan vendor:publish --tag=config
```


## Usage Example :
```php
    //using the default adapter
    resolve('iranian_sms')->make()->send('0912xxxxxxx','test2x');

    //using kavenegar adapter
    resolve('iranian_sms')->make('kavenegar')->send('0912xxxxxxx','test2x');


    //using Facede
    use IranianSms;
    IranianSms::make()->send('0912xxxxxxx','test2x');


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
	]
];
```