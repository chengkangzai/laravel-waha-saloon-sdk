<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\CheckNumberStatus;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Check number status
 */
class CheckNumberStatus extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/api/checkNumberStatus';
    }

    /**
     * @param  null|string  $phone  The phone number to check
     */
    public function __construct(
        protected ?string $phone = null,
        protected ?string $session = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['phone' => $this->phone, 'session' => $this->session]);
    }
}
