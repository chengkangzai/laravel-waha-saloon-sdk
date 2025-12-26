<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Contacts;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create or update contact
 */
class CreateOrUpdateContact extends Request implements HasBody
{
    use HasJsonBody;

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
