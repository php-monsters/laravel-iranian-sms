<?php

namespace Tartan\IranianSms;

use Tartan\IranianSms\Adapter\Discord;
use Tartan\IranianSms\Adapter\Ghasedak;
use Tartan\IranianSms\Adapter\MehrAfzar;
use Tartan\IranianSms\Adapter\KaveNegar;
use Tartan\IranianSms\Adapter\ParsaSms;
use Tartan\IranianSms\Adapter\Slack;
use Tartan\IranianSms\Adapter\SmsIr;
use Tartan\IranianSms\Adapter\SmsLog;

class Factory
{

    public function make($adapter = '')
    {

        if ($adapter == '') {
            $adapter = config('iranian_sms.default');
        }
        switch ($adapter) {
            case 'mehrafraz':
                return new MehrAfraz();
                break;
            case 'kavenegar':
                return new KaveNegar();
                break;
            case 'smsir':
                return new SmsIr();
                break;
            case 'log':
                return new SmsLog();
                break;
            case 'slack':
                return new Slack();
                break;
            case 'ghasedak':
                return new Ghasedak();
                break;
            case 'discord':
                return new Discord();
                break;
            case 'parsasms':
                return new ParsaSms();
                break;
            default:
                throw new Exception('Adapter not defined');
                break;
        }

    }
}

