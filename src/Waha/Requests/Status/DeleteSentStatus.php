<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Status;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * DELETE sent status
 */
class DeleteSentStatus extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/api/{$this->session}/status/delete";
    }

    public function __construct(
        protected string $session,
        protected mixed $id = null,
        protected mixed $contacts = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter(['id' => $this->id, 'contacts' => $this->contacts]);
    }
}
