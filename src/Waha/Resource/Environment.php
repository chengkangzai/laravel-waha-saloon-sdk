<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Environment\GetTheServerEnvironment;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Contracts\Response;

class Environment extends Resource
{
    /**
     * @param  string  $all  Include all environment variables
     */
    public function getTheServerEnvironment(?string $all): Response
    {
        return $this->connector->send(new GetTheServerEnvironment($all));
    }
}
