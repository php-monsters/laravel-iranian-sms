<?php

namespace Tartan\IranianSms\Adapter;

use Illuminate\Support\Facades\Log;

class SmsLog extends AdapterAbstract implements AdapterInterface
{
    public function send(string $number, string $message)
    {
        $number    = $this->filterNumber($number);
        $contents  = "To: {$number} ".PHP_EOL;
        $contents .= "Message: {$message} ".PHP_EOL;

        Log::debug($contents, ['tag' => 'sms']);
    }

    public function Verify(string $number, int $type, string $template, ...$args)
    {
        $number = $this->filterNumber($number);

        Log::debug("OTP Number: {$number} \n type: {$type} \n template: {$template} \n", $args);
    }
}
