<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Locales\GetAvailableLanguagesForChatwootApp;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class Locales extends Resource
{
    public function getAvailableLanguagesForChatwootApp(): Response
    {
        return $this->connector->send(new GetAvailableLanguagesForChatwootApp);
    }
}
