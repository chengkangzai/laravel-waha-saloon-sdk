<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\SendText;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Send a text message.
 *
 * @deprecated Use SendTextMessage (POST).
 */
class SendTextMessageViaQuery extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/api/sendText';
    }

    public function __construct(
        protected string $phone,
        protected string $text,
        protected string $session,
    ) {}

    public function defaultQuery(): array
    {
        $isNotNull = fn ($value) => $value !== null;

        return array_filter([
            'phone' => $this->phone,
            'text' => $this->text,
            'session' => $this->session,
        ], $isNotNull);
    }
}
