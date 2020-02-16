<?php

namespace Tartan\IranianSms\Adapter;

use Exception;

abstract class AdapterAbstract
{
    public function filterNumber(String $number) {
        $numberCheck = substr($number, -10);
        if (!preg_match('/9\d{9}$/', $numberCheck)) {
            throw new Exception('Number format is incorrect');
        }

        return $number;

    }
}
