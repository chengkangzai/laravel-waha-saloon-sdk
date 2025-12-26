<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Contacts;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Create or update contact
 */
class CreateOrUpdateContact extends Request
{
    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/api/{$this->session}/contacts/{$this->chatId}";
    }

    public function __construct(
        protected string $session,
        protected string $chatId,
        protected mixed $firstName = null,
        protected mixed $lastName = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter(['firstName' => $this->firstName, 'lastName' => $this->lastName]);
    }
}
