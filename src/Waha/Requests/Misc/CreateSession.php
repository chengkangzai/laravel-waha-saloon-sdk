<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Misc;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create a session
 */
class CreateSession extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/api/sessions';
    }

    public function __construct(
        protected mixed $name = null,
        protected mixed $start = null,
        protected mixed $sessionConfig = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter(['name' => $this->name, 'start' => $this->start, 'config' => $this->sessionConfig]);
    }
}
