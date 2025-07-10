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
     * @param  string  $session  The session identifier
     * @param  null|string  $format  Format parameter (raw, image)
     * @param  null|string  $acceptHeader  Accept header for response format
     */
    public function __construct(
        protected string $session,
        protected ?string $format = null,
        protected ?string $acceptHeader = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['format' => $this->format]);
    }

    public function defaultHeaders(): array
    {
        $headers = [];

        if ($this->acceptHeader) {
            $headers['Accept'] = $this->acceptHeader;
        }

        return $headers;
    }

    public static function forBinaryImage(string $session): self
    {
        return new self($session, null, 'image/png');
    }

    public static function forBase64Image(string $session): self
    {
        return new self($session, null, 'application/json');
    }

    public static function forRawValue(string $session): self
    {
        return new self($session, 'raw', 'application/json');
    }
}
