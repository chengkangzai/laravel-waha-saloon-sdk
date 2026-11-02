<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Misc;

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
        return '/api/screenshot';
    }

    /**
     * WAHA requires: $session. Nullable arguments remain for compatibility
     * with callers that populate the Saloon query/body stores before sending.
     *
     * @param  null|string  $session  (Required)
     */
    public function __construct(
        protected ?string $session = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['session' => $this->session], fn ($value) => $value !== null);
    }
}
