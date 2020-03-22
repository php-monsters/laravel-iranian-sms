<?php

namespace Tartan\IranianSms\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class IranianSms
 * @package Tartan\IranianSms\Facades
 */
class IranianSms extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'iraniansms';
    }
}
