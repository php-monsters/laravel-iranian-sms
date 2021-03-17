<?php

namespace Tartan\IranianSms\Adapter;

use Ghasedak\GhasedakApi;

class Ghasedak extends AdapterAbstract implements AdapterInterface
{
    private $credential = [
        'api_key' => '',
        'sender'  => '',
    ];

    public function __construct($account = null)
    {
        if (is_null($account)) {
            $this->credential['api_key'] = config('iranian_sms.ghasedak.api_key');
            $this->credential['sender']  = config('iranian_sms.ghasedak.sender');
        } else {
            $this->credential['api_key'] = config("iranian_sms.ghasedak.{$account}.api_key");
            $this->credential['sender']  = config("iranian_sms.ghasedak.{$account}.sender");
        }
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

    public function Verify(string $number, int $type, string $template, ...$args)
    {
        $number = $this->filterNumber($number);

        $api = new GhasedakApi($this->credential['api_key']);

        return $api->Verify(
            $number,
            $type,
            $template,
            ...$args
        );
    }
}
