<?php

namespace Tartan\IranianSms\Adapter;

use Illuminate\Support\Facades\Log;

class SmsLog extends AdapterAbstract implements AdapterInterface
{
    public function send(String $number, String $message)
    {
        $number    = $this->filterNumber($number);
        $contents  = "To: {$number} ".PHP_EOL;
        $contents .= "Message: {$message} ".PHP_EOL;

        Log::debug($contents, ['tag' => 'sms']);
    }
}