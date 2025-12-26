<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Voice;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Convert voice to WhatsApp format (opus)
 */
class ConvertVoiceToWhatsAppFormatOpus extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/api/{$this->session}/media/convert/voice";
    }

    public function __construct(
        protected string $session,
        protected mixed $url = null,
        protected mixed $data = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter(['url' => $this->url, 'data' => $this->data]);
    }
}
