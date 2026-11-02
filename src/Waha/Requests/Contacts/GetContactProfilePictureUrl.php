<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Contacts;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get contact's profile picture URL
 */
class GetContactProfilePictureUrl extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/api/contacts/profile-picture';
    }

    /**
     * WAHA requires: $contactId, $session. Nullable arguments remain for compatibility
     * with callers that populate the Saloon query/body stores before sending.
     *
     * @param  null|string  $contactId  (Required)
     * @param  string|bool|null  $refresh  Refresh the picture from the server (24h cache by default). Do not refresh if not needed, you can get rate limit error
     * @param  null|string  $session  (Required)
     */
    public function __construct(
        protected ?string $contactId = null,
        protected string|bool|null $refresh = null,
        protected ?string $session = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['contactId' => $this->contactId, 'refresh' => $this->refresh, 'session' => $this->session], fn ($value) => $value !== null);
    }
}
