<?php

namespace Tartan\IranianSms\Adapter;


interface AdapterInterface {

	public function send(String $number,String $text);

}