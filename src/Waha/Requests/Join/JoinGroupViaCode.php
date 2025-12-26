<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Join;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Join group via code
 */
class JoinGroupViaCode extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/api/{$this->session}/groups/join";
    }

    public function __construct(
        protected string $session,
        protected mixed $code = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter(['code' => $this->code]);
    }
}
