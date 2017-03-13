<?php

namespace Keraken\Iraniansms\Adapter;


interface AdapterInterface {

	public function send(String $number,String $text);

}