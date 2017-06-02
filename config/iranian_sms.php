<?php

return [
    //Default SMS gateway
    'default'   => env('IRANIANSMS_DEFAULT', 'mehrafzar'),
    'mehrafzar' => [
        'gateway'  => env('IRANIANSMS_MEHRAFZAR_GATEWAY', 'http://mehrafraz.com/webservice/Service.asmx?WSDL'),
        'username' => env('IRANIANSMS_MEHRAFZAR_USERNAME', 'test'),
        'password' => env('IRANIANSMS_MEHRAFZAR_PASSWORD', 'test'),
    ],
    'kavenegar' => [
        'gateway' => env('IRANIANSMS_KAVENEGAR_GATEWAY', 'http://api.kavenegar.com/v1/%s/%s/%s.json/'),
        'api_key' => env('IRANIANSMS_KAVENEGAR_APIKEY', 'test'),
        'sender'  => env('IRANIANSMS_KAVENEGAR_SENDER', 'test'),
    ],
    'smsir' => [
        'gateway' => env('IRANIANSMS_SMSIR_GATEWAY', 'http://ip.sms.ir/SendMessage.ashx'),
        'user' => env('IRANIANSMS_SMSIR_USER', 'test'),
        'pass'  => env('IRANIANSMS_SMSIR_PASS', 'test'),
        'lineNo'  => env('IRANIANSMS_SMSIR_LINENO', 'test'),
    ]
];