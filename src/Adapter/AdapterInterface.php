<?php

namespace Tartan\IranianSms\Adapter;

interface AdapterInterface
{
    public function send(string $number, string $text);
}
