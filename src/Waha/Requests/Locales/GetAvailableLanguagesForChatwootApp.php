<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\Locales;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get available languages for Chatwoot app
 */
class GetAvailableLanguagesForChatwootApp extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/api/apps/chatwoot/locales';
    }

    public function __construct() {}
}
