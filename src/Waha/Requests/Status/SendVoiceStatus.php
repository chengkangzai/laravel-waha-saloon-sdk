<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Status;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Send voice status
 */
class SendVoiceStatus extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/api/{$this->session}/status/voice";
    }

    /**
     * WAHA requires: $file, $backgroundColor. Nullable arguments remain for compatibility
     * with callers that populate the Saloon query/body stores before sending.
     */
    public function __construct(
        protected string $session,
        protected mixed $file = null,
        protected mixed $backgroundColor = null,
        protected mixed $id = null,
        protected mixed $contacts = null,
        protected ?bool $convert = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter([
            'file' => $this->file,
            'backgroundColor' => $this->backgroundColor,
            'id' => $this->id,
            'contacts' => $this->contacts,
            'convert' => $this->convert,
        ], fn ($value) => $value !== null);
    }
}
