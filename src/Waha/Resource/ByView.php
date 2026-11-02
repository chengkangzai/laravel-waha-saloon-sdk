<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\ByView\SearchForChannelsByView;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class ByView extends Resource
{
    public function searchForChannelsByView(
        string $session,
        mixed $view = null,
        mixed $countries = null,
        mixed $categories = null,
        mixed $limit = null,
        mixed $startCursor = null,
    ): Response {
        return $this->connector->send(new SearchForChannelsByView($session, $view, $countries, $categories, $limit, $startCursor));
    }
}
