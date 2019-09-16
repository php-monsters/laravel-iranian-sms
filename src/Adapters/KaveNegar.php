<?php

namespace Tartan\IranianSms\Adapter;

use Kavenegar\KavenegarApi;
use Kavenegar\Exceptions\ApiException;
use Kavenegar\Exceptions\HttpException;
use phpDocumentor\Reflection\Types\String_;

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

        try{
            $api = $this->api;
            $result = $api->Send($this->sender,$number,$message);
            if($result){
                return var_dump($result);
            }
        }
        catch(ApiException $e){
            // در صورتی که خروجی وب سرویس 200 نباشد این خطا رخ می دهد
            return $e->errorMessage();
        }
        catch(HttpException $e){
            // در زمانی که مشکلی در برقرای ارتباط با وب سرویس وجود داشته باشد این خطا رخ می دهد
            return $e->errorMessage();
        }
	}

    public function verifyLookup(String $number, String $token, String $template)
    {
        try{
            $api = $this->api;
            $result = $api->VerifyLookup($number,$token,$token2 = '',$token3 = '',$template,$type = null);
            if($result){
                var_dump($result);
            }
        }
        catch(ApiException $e){
            echo $e->errorMessage();
        }
        catch(HttpException $e){
            echo $e->errorMessage();
        }
	}
}