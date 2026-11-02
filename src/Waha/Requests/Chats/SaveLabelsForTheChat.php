<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Chats;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Save labels for the chat
 */
class SaveLabelsForTheChat extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/api/{$this->session}/labels/chats/{$this->chatId}";
    }

    /**
     * WAHA requires: $labels. Nullable arguments remain for compatibility
     * with callers that populate the Saloon query/body stores before sending.
     */
    public function __construct(
        protected string $session,
        protected string $chatId,
        protected mixed $labels = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter(['labels' => $this->labels], fn ($value) => $value !== null);
    }
}
