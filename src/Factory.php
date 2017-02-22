<?php

namespace Tartan\IranianSms;

use Tartan\IranianSms\Adapter\MehrAfzar;

class Factory {

	function __construct($app) {

	}

	public function make($adapter) {
		switch ($adapter) {
		case 'mehrafzar':
			# code...
			return new MehrAfzar();
			break;

		default:
			# code...
			break;
		}
	}
}