<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\SendText;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Send a text message
 */
class SendTextMessage extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/api/sendText';
    }

    /**
     * @param  null|string  $phone  (Required)
     * @param  null|string  $text  (Required)
     * @param  null|string  $session  (Required)
     */
    public function __construct(
        protected ?string $phone = null,
        protected ?string $text = null,
        protected ?string $session = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['phone' => $this->phone, 'text' => $this->text, 'session' => $this->session]);
    }
}
