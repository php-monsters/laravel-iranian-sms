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

    public function make($adapter = '', $account = null)
    {

        if ($adapter == '') {
            $adapter = config('iranian_sms.default');
        }
        switch ($adapter) {
            case 'mehrafraz':
                return new MehrAfraz($account);
                break;
            case 'kavenegar':
                return new KaveNegar($account);
                break;
            case 'smsir':
                return new SmsIr($account);
                break;
            case 'log':
                return new SmsLog($account);
                break;
            case 'slack':
                return new Slack($account);
                break;
            case 'ghasedak':
                return new Ghasedak($account);
                break;
            case 'discord':
                return new Discord($account);
                break;
            case 'parsasms':
                return new ParsaSms($account);
                break;
            default:
                throw new Exception('Adapter not defined');
                break;
        }

    }
}

