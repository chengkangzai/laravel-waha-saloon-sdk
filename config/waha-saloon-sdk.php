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
