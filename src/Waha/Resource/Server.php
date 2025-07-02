<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Server\GetTheServerEnvironment;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Server\GetTheServerStatus;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Server\GetTheVersionOfTheServer;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Server\ReturnHeapsnapshot;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Server\StopAndRestartTheServer;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class Server extends Resource
{
    public function getTheVersionOfTheServer(): Response
    {
        return $this->connector->send(new GetTheVersionOfTheServer);
    }

    /**
     * @param  string  $all  Include all environment variables
     */
    public function getTheServerEnvironment(?string $all): Response
    {
        return $this->connector->send(new GetTheServerEnvironment($all));
    }

    public function getTheServerStatus(): Response
    {
        return $this->connector->send(new GetTheServerStatus);
    }

    public function stopAndRestartTheServer(mixed $force): Response
    {
        return $this->connector->send(new StopAndRestartTheServer($force));
    }

    public function returnHeapsnapshot(): Response
    {
        return $this->connector->send(new ReturnHeapsnapshot);
    }
}
