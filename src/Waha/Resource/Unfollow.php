<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Unfollow\UnfollowTheChannel;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class Unfollow extends Resource
{
    public function unfollowTheChannel(string $session, string $id): Response
    {
        return $this->connector->send(new UnfollowTheChannel($session, $id));
    }
}
