<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Api;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Gets chat picture
 */
class GetsChatPicture extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/api/{$this->session}/chats/{$this->chatId}/picture";
    }

    /**
     * @param  null|string  $refresh  Refresh the picture from the server (24h cache by default). Do not refresh if not needed, you can get rate limit error
     */
    public function __construct(
        protected string $session,
        protected string $chatId,
        protected ?string $refresh = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['refresh' => $this->refresh]);
    }
}
