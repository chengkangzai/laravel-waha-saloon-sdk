<?php

namespace CCK\LaravelWahaSaloonSdk\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \CCK\LaravelWahaSaloonSdk\LaravelWahaSaloonSdk
 */
class LaravelWahaSaloonSdk extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \CCK\LaravelWahaSaloonSdk\LaravelWahaSaloonSdk::class;
    }
}
