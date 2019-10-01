<?php

namespace Tartan\IranianSms\Adapter;

use Ghasedak\GhasedakApi;

class ParsaSms extends AdapterAbstract implements AdapterInterface
{

    private $credential = [
        'gateway'   => '',
        'api_key'   => '',
        'sender'   => ''
    ];

    public function __construct()
    {
        $this->credential['gateway']   = config('iranian_sms.parsasms.gateway');
        $this->credential['api_key']   = config('iranian_sms.parsasms.api_key');
        $this->credential['sender'] = config('iranian_sms.parsasms.sender');
    }

    public function send(String $number, String $message)
    {
        $number = $this->filterNumber($number);
        $sender = $this->credential['sender'];
        $api_key = $this->credential['api_key'];

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->credential['gateway'],
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "message=$message &sender=$sender &Receptor=$number",
            CURLOPT_CONNECTTIMEOUT => 5,
            CURLOPT_TIMEOUT => 5,
            CURLOPT_HTTPHEADER => array(
                "apikey: $api_key"),
            CURLOPT_RETURNTRANSFER => true,
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        
        return $response;
    }
}
