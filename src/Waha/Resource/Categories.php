<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Categories\GetListOfCategoriesForChannelSearch;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class Categories extends Resource
{
    public function getListOfCategoriesForChannelSearch(string $session): Response
    {
        return $this->connector->send(new GetListOfCategoriesForChannelSearch($session));
    }
}
