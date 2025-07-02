<?php

namespace CCK\LaravelWahaSaloonSdk\Waha;

use Saloon\Http\Connector;

class Resource
{
	public function __construct(
		protected Connector $connector,
	) {
	}
}
