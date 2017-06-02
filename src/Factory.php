<?php

namespace Keraken\IranianSms;

use Keraken\IranianSms\Adapter\MehrAfzar;
use Keraken\IranianSms\Adapter\KaveNegar;
use Keraken\IranianSms\Adapter\SmsIr;

class Factory
{

    function __construct($app)
    {

    }

    public function make($adapter = '')
    {

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
            case 'smsir':
                # code...
                return new SmsIr();
                break;

            default:
                # code...
                break;
        }
    }
}

