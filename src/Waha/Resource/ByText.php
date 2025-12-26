<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\ByText\SearchForChannelsByText;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Contracts\Response;

class ByText extends Resource
{
    public function searchForChannelsByText(
        string $session,
        mixed $text,
        mixed $categories,
        mixed $limit,
        mixed $startCursor,
    ): Response {
        return $this->connector->send(new SearchForChannelsByText($session, $text, $categories, $limit, $startCursor));
    }
}
