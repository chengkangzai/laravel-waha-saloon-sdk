<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Views\GetListOfViewsForChannelSearch;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Contracts\Response;

class Views extends Resource
{
    public function getListOfViewsForChannelSearch(string $session): Response
    {
        return $this->connector->send(new GetListOfViewsForChannelSearch($session));
    }
}
