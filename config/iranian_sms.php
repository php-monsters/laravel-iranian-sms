<?php

return [
	'mehrafzar' => [
		'gateway' => env('IRANIANSMS_MEHRAFZAR_GATEWAY','http://mehrafraz.com/webservice/Service.asmx?WSDL'),
		'username' => env('IRANIANSMS_MEHRAFZAR_USERNAME','test'),
		'password' => env('IRANIANSMS_MEHRAFZAR_PASSWORD','test'),
	]
];