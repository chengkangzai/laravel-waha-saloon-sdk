<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\RequestCode;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Request authentication code.
 */
class RequestAuthenticationCode extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/api/{$this->session}/auth/request-code";
    }

    public function __construct(
        protected string $session,
        protected mixed $phoneNumber = null,
        protected mixed $authMethod = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter(['phoneNumber' => $this->phoneNumber, 'method' => $this->authMethod]);
    }
}
