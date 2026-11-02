<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Chatwoot;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Chatwoot Webhook.
 */
class ChatwootWebhook extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/webhooks/chatwoot/{$this->session}/{$this->id}";
    }

    /**
     * The OpenAPI document leaves the protocol payload unspecified.
     *
     * @param  array<string, mixed>  $payload  JSON protocol payload.
     */
    public function __construct(
        protected string $session,
        protected string $id,
        protected array $payload = [],
    ) {}

    public function defaultBody(): array
    {
        return array_filter($this->payload, fn ($value) => $value !== null);
    }
}
