<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Follow\FollowTheChannel;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class Follow extends Resource
{
    public function followTheChannel(string $session, string $id): Response
    {
        return $this->connector->send(new FollowTheChannel($session, $id));
    }
}
