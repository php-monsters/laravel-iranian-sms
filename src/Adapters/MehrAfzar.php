<?php

namespace Keraken\IranianSms\Adapter;

class MehrAfzar extends AdapterAbstract implements AdapterInterface {

	public $gateway_url;
	private $credential = [
		'username' => '',
		'password' => '',
	];

	public static $status_real = [
		0 => 'SENDING',
		1 => 'SERVICE_DELIVERED',
		2 => 'DELIVERED',
		3 => 'FAILED',
		4 => 'BLACKLIST',
		5 => 'NOT_EXPERT',
		6 => 'CANCELED',
		7 => 'UNKNOWN_DESTINATION',
		8 => 'BTS_SENT',
		12 => 'NOT_SENT_OPERATOR',
		16 => 'BTS_ERROR',
	];

	public function __construct() {
		$this->gateway_url = config('iranian_sms.mehrafzar.gateway');
		$this->credential['username'] = config('iranian_sms.mehrafzar.username');
		$this->credential['password'] = config('iranian_sms.mehrafzar.password');
	}

	public function send(String $number,String $message) {

		$number = $this->filterNumber($number);

		$parameters = array(
			'cUserName' => $this->credential['username'],
			'cPassword' => $this->credential['password'],
			'cBody' => $message,
			'cSmsnumber' => $number,
			'cGetid' => time(),
			'nCMessage' => '1',
			'nTypeSent' => '1',
			'm_SchedulDate' => '',
			'cDomainname' => $this->credential['username'],
			'nSpeedsms' => '0',
			'nPeriodmin' => '0',
			'cstarttime' => '',
			'cEndTime' => '',
		);

		try {

			$soapParams = [];
			$soapParams['xml_encoding'] = "UTF-8";
			$soapParams['soap_defencoding'] = "UTF-8";
			$soapParams['decode_utf8'] = false;
			$soapParams['exceptions'] = 1;
			$soapClient = @new \SoapClient($this->gateway_url, $soapParams);
			$result = $soapClient->SendSms($parameters);

		} catch (SoapFault $client) {

		} catch (Exception $e) {

		}


		if (($result->SendSmsResult && $result->SendSmsResult > 1000)) {
			return $result->SendSmsResult;
		}

		throw new \Exception("SMS cannot be send!");
	}

}