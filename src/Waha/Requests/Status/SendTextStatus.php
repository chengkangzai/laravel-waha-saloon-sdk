<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Status;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Send text status
 */
class SendTextStatus extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/api/{$this->session}/status/text";
    }

    public function __construct(
        protected string $session,
        protected mixed $text = null,
        protected mixed $backgroundColor = null,
        protected mixed $font = null,
        protected mixed $id = null,
        protected mixed $contacts = null,
        protected mixed $linkPreview = null,
        protected mixed $linkPreviewHighQuality = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter([
            'text' => $this->text,
            'backgroundColor' => $this->backgroundColor,
            'font' => $this->font,
            'id' => $this->id,
            'contacts' => $this->contacts,
            'linkPreview' => $this->linkPreview,
            'linkPreviewHighQuality' => $this->linkPreviewHighQuality,
        ]);
    }
}
