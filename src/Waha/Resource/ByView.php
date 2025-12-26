<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\ByView\SearchForChannelsByView;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Contracts\Response;

class ByView extends Resource
{
    public function searchForChannelsByView(
        string $session,
        mixed $view,
        mixed $countries,
        mixed $categories,
        mixed $limit,
        mixed $startCursor,
    ): Response {
        return $this->connector->send(new SearchForChannelsByView($session, $view, $countries, $categories, $limit, $startCursor));
    }
}
