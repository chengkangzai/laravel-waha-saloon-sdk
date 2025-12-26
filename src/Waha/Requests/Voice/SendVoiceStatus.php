<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Voice;

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

    public function __construct(
        protected string $session,
        protected mixed $file = null,
        protected mixed $convert = null,
        protected mixed $backgroundColor = null,
        protected mixed $id = null,
        protected mixed $contacts = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter([
            'file' => $this->file,
            'convert' => $this->convert,
            'backgroundColor' => $this->backgroundColor,
            'id' => $this->id,
            'contacts' => $this->contacts,
        ]);
    }
}
