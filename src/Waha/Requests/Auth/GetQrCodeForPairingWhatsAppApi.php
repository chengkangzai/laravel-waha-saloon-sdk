<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Auth;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get QR code for pairing WhatsApp API.
 */
class GetQrCodeForPairingWhatsAppApi extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/api/{$this->session}/auth/qr";
    }

    /**
     * @param  null|string  $format  (Required)
     */
    public function __construct(
        protected string $session,
        protected ?string $format = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['format' => $this->format]);
    }
}
