<?php

namespace Tartan\IranianSms\Adapter;

use Exception;

abstract class AdapterApstract {

	public function filterNumber(String $number) {

		$number = substr($number, -11);

		dd($number);
		if (!preg_match('/9\d{10}$/', $number)) {
			throw new Exception('Number format is incorrect');
		}

	}

}