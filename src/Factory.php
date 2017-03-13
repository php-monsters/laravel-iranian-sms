<?php

namespace Keraken\IranianSms;

use Keraken\IranianSms\Adapter\MehrAfzar;
use Keraken\IranianSms\Adapter\KaveNegar;

class Factory {

	function __construct($app) {

	}

	public function make($adapter ='') {

		if ($adapter == '') {
			$adapter = config('iranian_sms.default');
		}
		switch ($adapter) {
		case 'mehrafzar':
			# code...
			return new MehrAfzar();
			break;
		case 'kavenegar':
			# code...
			return new KaveNegar();
			break;

		default:
			# code...
			break;
		}
	}
}

