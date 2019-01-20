<?php

namespace Tartan\IranianSms;

use Tartan\IranianSms\Adapter\MehrAfzar;
use Tartan\IranianSms\Adapter\KaveNegar;
use Tartan\IranianSms\Adapter\SmsIr;

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

