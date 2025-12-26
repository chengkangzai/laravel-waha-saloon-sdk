<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Video;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Send video status
 */
class SendVideoStatus extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/api/{$this->session}/status/video";
    }

    public function __construct(
        protected string $session,
        protected mixed $file = null,
        protected mixed $convert = null,
        protected mixed $id = null,
        protected mixed $contacts = null,
        protected mixed $caption = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter([
            'file' => $this->file,
            'convert' => $this->convert,
            'id' => $this->id,
            'contacts' => $this->contacts,
            'caption' => $this->caption,
        ]);
    }
}
