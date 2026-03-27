<?php

// config for CCK/LaravelWahaSaloonSdk
return [
    /*
    |--------------------------------------------------------------------------
    | Default Connection
    |--------------------------------------------------------------------------
    |
    | The default connection name to use when calling Waha::connection()
    | without specifying a connection name.
    |
    */
    'default' => env('WAHA_CONNECTION', 'default'),

    /*
    |--------------------------------------------------------------------------
    | WAHA Connections
    |--------------------------------------------------------------------------
    |
    | Configure multiple WAHA hosts here. Each connection requires a base_url
    | and optionally an api_key.
    |
    */
    'connections' => [
        'default' => [
            'base_url' => env('WAHA_BASE_URL', ''),
            'api_key' => env('WAHA_API_KEY', ''),
        ],

        // Example additional connections:
        // 'production' => [
        //     'base_url' => env('WAHA_PRODUCTION_URL', ''),
        //     'api_key' => env('WAHA_PRODUCTION_KEY', ''),
        // ],
        // 'staging' => [
        //     'base_url' => env('WAHA_STAGING_URL', ''),
        //     'api_key' => env('WAHA_STAGING_KEY', ''),
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Timeout Configuration
    |--------------------------------------------------------------------------
    |
    | Configure the connection and request timeouts (in seconds) for the
    | WAHA API. The request timeout should be generous enough for media
    | operations (sendImage, sendVideo, etc.) where WAHA downloads and
    | processes files server-side before sending.
    |
    */
    'timeout' => env('WAHA_REQUEST_TIMEOUT', 60),
    'connect_timeout' => env('WAHA_CONNECT_TIMEOUT', 10),

    /*
    |--------------------------------------------------------------------------
    | Always Throw On Errors
    |--------------------------------------------------------------------------
    |
    | When enabled, non-2xx responses will automatically throw a
    | RequestException instead of returning a response object. This
    | prevents misleading JsonException errors when calling ->json()
    | on error responses (e.g. HTML error pages, empty bodies).
    |
    */
    'always_throw_on_errors' => env('WAHA_ALWAYS_THROW_ON_ERRORS', false),

    /*
    |--------------------------------------------------------------------------
    | Legacy Configuration (Backward Compatibility)
    |--------------------------------------------------------------------------
    |
    | These keys are kept for backward compatibility with older versions.
    | If 'connections.default' has empty values, these will be used as fallback.
    |
    */
    'base_url' => env('WAHA_BASE_URL', ''),
    'api_key' => env('WAHA_API_KEY', ''),
];
