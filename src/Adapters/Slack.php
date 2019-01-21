<?php

namespace Tartan\IranianSms\Adapter;

class Slack extends AdapterAbstract implements AdapterInterface
{
    public $url;

    public function __construct()
    {
        $this->url = config('iranian_sms.slack.url');
    }

    public function send(String $number, String $message)
    {
        $number = $this->filterNumber($number);

        $data = json_encode(['text' => "To: $number - Message: $message"]);

        $ch = curl_init($this->url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, array('Content-Type: application/json'));
        $data = curl_exec($ch);

        if(curl_errno($ch)){
            throw new Exception(curl_error($ch));
        }

        return $data;
    }
}