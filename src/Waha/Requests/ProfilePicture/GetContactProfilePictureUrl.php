<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\ProfilePicture;

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
     * @param  null|string  $refresh  Refresh the picture from the server (24h cache by default). Do not refresh if not needed, you can get rate limit error
     */
    public function __construct(
        protected ?string $contactId = null,
        protected ?string $refresh = null,
        protected ?string $session = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['contactId' => $this->contactId, 'refresh' => $this->refresh, 'session' => $this->session]);
    }
}
