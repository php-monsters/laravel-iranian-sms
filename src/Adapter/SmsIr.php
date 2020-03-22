<?php

namespace Tartan\IranianSms\Adapter;

class SmsIr extends AdapterAbstract implements AdapterInterface
{

    public  $gateway_url;
    private $credential = [
        'user'   => '',
        'pass'   => '',
        'lineNo' => '',
    ];


    public function __construct()
    {
        $this->gateway_url          = config('iranian_sms.smsir.gateway');
        $this->credential['user']   = config('iranian_sms.smsir.user');
        $this->credential['pass']   = config('iranian_sms.smsir.pass');
        $this->credential['lineNo'] = config('iranian_sms.smsir.line_no');
    }

    public function send(string $number, string $message)
    {

        $number = $this->filterNumber($number);

        $propertiesObject = [
            'user'   => $this->credential['user'],
            'pass'   => $this->credential['pass'],
            'lineNo' => $this->credential['lineNo'],
            'to'     => $number,
            'text'   => $message,
        ];

        $ch = curl_init($this->gateway_url . '?' . http_build_query($propertiesObject)); // such as http://example.com/example.xml
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $data = curl_exec($ch);
        curl_close($ch);

        return $data;
    }
}
