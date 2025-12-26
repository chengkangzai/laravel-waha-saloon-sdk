<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Stop;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Stop (and Logout if asked) session
 */
class StopAndLogoutIfAskedSession extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/api/sessions/stop';
    }

    public function __construct(
        protected mixed $name = null,
        protected mixed $logout = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter(['name' => $this->name, 'logout' => $this->logout]);
    }
}
