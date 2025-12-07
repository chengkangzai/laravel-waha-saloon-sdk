<?php

namespace CCK\LaravelWahaSaloonSdk\Facades;

use CCK\LaravelWahaSaloonSdk\WahaManager;
use Illuminate\Support\Facades\Facade;

/**
 * @deprecated Use \CCK\LaravelWahaSaloonSdk\Facades\Waha instead
 * @see WahaManager
 */
class LaravelWahaSaloonSdk extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return WahaManager::class;
    }
}
