<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Search\GetListOfCategoriesForChannelSearch;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Search\GetListOfCountriesForChannelSearch;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Search\GetListOfViewsForChannelSearch;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Search\SearchForChannelsByText;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Search\SearchForChannelsByView;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class Search extends Resource
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

    public function searchForChannelsByText(
        string $session,
        mixed $text = null,
        mixed $categories = null,
        mixed $limit = null,
        mixed $startCursor = null,
    ): Response {
        return $this->connector->send(new SearchForChannelsByText($session, $text, $categories, $limit, $startCursor));
    }

    public function getListOfViewsForChannelSearch(string $session): Response
    {
        return $this->connector->send(new GetListOfViewsForChannelSearch($session));
    }

    public function getListOfCountriesForChannelSearch(string $session): Response
    {
        return $this->connector->send(new GetListOfCountriesForChannelSearch($session));
    }

    public function getListOfCategoriesForChannelSearch(string $session): Response
    {
        return $this->connector->send(new GetListOfCategoriesForChannelSearch($session));
    }
}
