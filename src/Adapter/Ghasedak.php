<?php

namespace Tartan\IranianSms\Adapter;

use Ghasedak\GhasedakApi;

class Ghasedak extends AdapterAbstract implements AdapterInterface
{

    private $credential = [
        'api_key'   => '',
        'sender'   => ''
    ];

    public function __construct()
    {
        $this->credential['api_key']   = config('iranian_sms.ghasedak.api_key');
        $this->credential['sender'] = config('iranian_sms.ghasedak.sender');
    }

    public function send(string $number, string $message)
    {

        $number = $this->filterNumber($number);

        $api = new GhasedakApi($this->credential['api_key']);

        return $api->SendSimple(
            $number,
            $message,
            $this->credential['sender']
        );

    }
}
