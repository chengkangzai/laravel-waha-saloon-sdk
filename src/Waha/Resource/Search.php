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
	/**
	 * @param string $session
	 * @param mixed $view
	 * @param mixed $countries
	 * @param mixed $categories
	 * @param mixed $limit
	 * @param mixed $startCursor
	 */
	public function searchForChannelsByView(
		string $session,
		mixed $view,
		mixed $countries,
		mixed $categories,
		mixed $limit,
		mixed $startCursor,
	): Response
	{
		return $this->connector->send(new SearchForChannelsByView($session, $view, $countries, $categories, $limit, $startCursor));
	}


	/**
	 * @param string $session
	 * @param mixed $text
	 * @param mixed $categories
	 * @param mixed $limit
	 * @param mixed $startCursor
	 */
	public function searchForChannelsByText(
		string $session,
		mixed $text,
		mixed $categories,
		mixed $limit,
		mixed $startCursor,
	): Response
	{
		return $this->connector->send(new SearchForChannelsByText($session, $text, $categories, $limit, $startCursor));
	}


	/**
	 * @param string $session
	 */
	public function getListOfViewsForChannelSearch(string $session): Response
	{
		return $this->connector->send(new GetListOfViewsForChannelSearch($session));
	}


	/**
	 * @param string $session
	 */
	public function getListOfCountriesForChannelSearch(string $session): Response
	{
		return $this->connector->send(new GetListOfCountriesForChannelSearch($session));
	}


	/**
	 * @param string $session
	 */
	public function getListOfCategoriesForChannelSearch(string $session): Response
	{
		return $this->connector->send(new GetListOfCategoriesForChannelSearch($session));
	}
}
