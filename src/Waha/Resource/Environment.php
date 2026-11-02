<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Environment\GetTheServerEnvironment;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class Environment extends Resource
{
    /**
     * @param  string|bool|null  $all  Include all environment variables
     */
    public function getTheServerEnvironment(string|bool|null $all = null): Response
    {
        return $this->connector->send(new GetTheServerEnvironment($all));
    }
}
