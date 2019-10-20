<?php

namespace Tartan\IranianSms\Adapter;

use Kavenegar\KavenegarApi;
use Kavenegar\Exceptions\ApiException;
use Kavenegar\Exceptions\HttpException;

class KaveNegar extends AdapterAbstract implements AdapterInterface {

	private $credential = [
		'api_key' => '',
	];
	public $sender;
	public $api;

	public static $status_real = [
		1 => 'SENDING',
		2 => 'SENDING',
		4 => 'SERVICE_DELIVERED',
		5 => 'BTS_SENT',
		6 => 'FAILED',
		10 => 'DELIVERED',
		11 => 'NOT_SENT_OPERATOR',
		13 => 'CANCELED',
		14 => 'BLACKLIST',
		100 => 'UNKNOWN_DESTINATION',
	];

	public function __construct() {
		$this->credential['api_key'] = config('iranian_sms.kavenegar.api_key');
		$this->sender = config('iranian_sms.kavenegar.sender');
		$this->api = new KavenegarApi($this->credential['api_key']);
	}

	public function send(String $number, String $message) {
		$number = $this->filterNumber($number);

        $api = $this->api;
        $result = $api->Send($this->sender,$number,$message);

        return $result[0]->messageid;
	}

    public function verifyLookup(String $number, String $token, String $template)
    {
        $number = $this->filterNumber($number);

        $api = $this->api;
        $result = $api->VerifyLookup($number,$token,$token2 = '',$token3 = '',$template,$type = null);

        return $result[0]->messageid;
	}
}