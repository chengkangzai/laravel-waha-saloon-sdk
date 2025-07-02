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
     * @param  null|string  $contactId  (Required)
     * @param  null|string  $session  (Required)
     */
    public function __construct(
        protected ?string $contactId = null,
        protected ?string $session = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['contactId' => $this->contactId, 'session' => $this->session]);
    }
}
