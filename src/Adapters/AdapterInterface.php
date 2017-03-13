<?php

namespace Keraken\IranianSms\Adapter;


interface AdapterInterface {

	public function send(String $number,String $text);

}