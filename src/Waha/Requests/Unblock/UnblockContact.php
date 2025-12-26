<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Unblock;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Unblock contact
 */
class UnblockContact extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/api/contacts/unblock';
    }

    public function __construct(
        protected mixed $contactId = null,
        protected mixed $session = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter(['contactId' => $this->contactId, 'session' => $this->session]);
    }
}
