<?php

namespace Tartan\IranianSms\Adapter;

class Slack extends AdapterAbstract implements AdapterInterface
{
    public $url;

    public function __construct($account = null)
    {
        if (is_null($account)) {
            $this->url = config('iranian_sms.slack.url');
        } else {
            $this->url = config("iranian_sms.slack.{$account}.url");
        }
    }

    public function send(string $number, string $message)
    {
        $number = $this->filterNumber($number);

        $jsonData = json_encode(['text' => "To: $number - Message: $message"]);

        $curl = $this->getCurl();
        $curl->addHeader('Content-Type', 'application/json');

        $curl->rawPost($this->url, $jsonData);
    }

    public function Verify(string $number, int $type, string $template, ...$args)
    {
        $number = $this->filterNumber($number);

        $jsonData = json_encode([
            'text' => "To: {$number} - type: {$type} \n template: {$template} \n OTP: $args[0]"
        ]);

        $curl = $this->getCurl();
        $curl->addHeader('Content-Type', 'application/json');

        $curl->rawPost($this->url, $jsonData);
    }
}
