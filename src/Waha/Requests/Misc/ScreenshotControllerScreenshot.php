<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Misc;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Screenshot Controller screenshot
 */
class ScreenshotControllerScreenshot extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/api/screenshot";
	}


	/**
	 * @param null|string $session (Required)
	 */
	public function __construct(
		protected ?string $session = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['session' => $this->session]);
	}
}
