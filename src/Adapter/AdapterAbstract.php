<?php

namespace Tartan\IranianSms\Adapter;

use Tartan\IranianSms\Exception;

abstract class AdapterAbstract {

	public function filterNumber(string $number) {

		$numberCheck = substr($number, -10);
		if (!preg_match('/9\d{9}$/', $numberCheck)) {
			throw new Exception('Number format is incorrect');
		}

		return $number;

	}

}
