<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\CheckNumberStatus;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Check number status
 *
 * @deprecated Use CheckExists\CheckPhoneNumberIsRegisteredInWhatsApp (GET /api/contacts/check-exists).
 */
class CheckNumberStatus extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/api/checkNumberStatus';
    }

    /**
     * WAHA requires: $phone, $session. Nullable arguments remain for compatibility
     * with callers that populate the Saloon query/body stores before sending.
     *
     * @param  null|string  $phone  The phone number to check
     */
    public function __construct(
        protected ?string $phone = null,
        protected ?string $session = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['phone' => $this->phone, 'session' => $this->session], fn ($value) => $value !== null);
    }
}
