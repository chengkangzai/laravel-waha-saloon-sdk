<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Misc;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Star or unstar a message
 */
class StarOrUnstarMessage extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return '/api/star';
    }

    /**
     * WAHA requires: $messageId, $chatId, $star, $session. Nullable arguments remain for compatibility
     * with callers that populate the Saloon query/body stores before sending.
     */
    public function __construct(
        protected mixed $messageId = null,
        protected mixed $chatId = null,
        protected mixed $star = null,
        protected mixed $session = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter(['messageId' => $this->messageId, 'chatId' => $this->chatId, 'star' => $this->star, 'session' => $this->session], fn ($value) => $value !== null);
    }
}
