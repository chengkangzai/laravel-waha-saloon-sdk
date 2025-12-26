<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Start;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Upsert and Start session
 */
class UpsertAndStartSession extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/api/sessions/start';
    }

    public function __construct(
        protected mixed $name = null,
        protected mixed $sessionConfig = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter(['name' => $this->name, 'config' => $this->sessionConfig]);
    }
}
