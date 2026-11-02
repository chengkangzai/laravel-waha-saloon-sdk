<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Misc;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Chatting Controller send Link Preview DEPRECATED
 *
 * @deprecated Use LinkCustomPreview\SendTextMessageWithCustomLinkPreview.
 */
class ChattingControllerSendLinkPreviewDeprecated extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/api/sendLinkPreview';
    }

    /**
     * WAHA requires: $chatId, $url, $title, $session. Nullable arguments remain for compatibility
     * with callers that populate the Saloon query/body stores before sending.
     */
    public function __construct(
        protected mixed $chatId = null,
        protected mixed $session = null,
        protected mixed $url = null,
        protected mixed $title = null,
        protected ?string $id = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter([
            'chatId' => $this->chatId,
            'session' => $this->session,
            'url' => $this->url,
            'title' => $this->title,
            'id' => $this->id,
        ], fn ($value) => $value !== null);
    }
}
