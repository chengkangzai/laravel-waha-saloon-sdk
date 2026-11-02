<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Stop;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Stop (and Logout if asked) session
 *
 * @deprecated Use Stop\StopTheSession and Logout\LogoutFromTheSession.
 */
class StopAndLogoutIfAskedSession extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/api/sessions/stop';
    }

    /**
     * WAHA requires: $name. Nullable arguments remain for compatibility
     * with callers that populate the Saloon query/body stores before sending.
     */
    public function __construct(
        protected mixed $name = null,
        protected mixed $logout = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter(['name' => $this->name, 'logout' => $this->logout], fn ($value) => $value !== null);
    }
}
