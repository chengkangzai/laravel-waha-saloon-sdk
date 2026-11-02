<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Contacts;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Gets the Contact's "about" info
 */
class GetsTheContactAboutInfo extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/api/contacts/about';
    }

    /**
     * WAHA requires: $contactId, $session. Nullable arguments remain for compatibility
     * with callers that populate the Saloon query/body stores before sending.
     *
     * @param  null|string  $contactId  (Required)
     * @param  null|string  $session  (Required)
     */
    public function __construct(
        protected ?string $contactId = null,
        protected ?string $session = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['contactId' => $this->contactId, 'session' => $this->session], fn ($value) => $value !== null);
    }
}
