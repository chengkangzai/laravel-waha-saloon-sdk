<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Description\UpdatesTheGroupDescription;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class Description extends Resource
{
    public function updatesTheGroupDescription(string $session, string $id, mixed $description): Response
    {
        return $this->connector->send(new UpdatesTheGroupDescription($session, $id, $description));
    }
}
