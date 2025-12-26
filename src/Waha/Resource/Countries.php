<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Countries\GetListOfCountriesForChannelSearch;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class Countries extends Resource
{
    public function getListOfCountriesForChannelSearch(string $session): Response
    {
        return $this->connector->send(new GetListOfCountriesForChannelSearch($session));
    }
}
