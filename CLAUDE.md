# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

This is a Laravel package that provides a PHP SDK for the WAHA (WhatsApp HTTP API) service. The SDK is auto-generated from a Postman collection and uses SaloonPHP as the HTTP client abstraction layer.

## Key Development Commands

```bash
# Generate/Regenerate SDK from Postman collection
composer build-from-postman

# Code Quality
composer format          # Format code with Laravel Pint
composer analyse        # Run PHPStan static analysis (level 5)

# Testing
composer test           # Run Pest PHP tests
composer test-coverage  # Run tests with coverage report

# Development
composer install        # Install dependencies
```

## Architecture

### Core Structure
```
Waha (Connector) -> Resources (23) -> Requests (134)
```

- **Connector**: `src/Waha/Waha.php` - Main Saloon connector extending `Saloon\Http\Connector`
- **Resources**: Located in `src/Waha/Resource/` - Group related API endpoints (e.g., Admin, Auth, Channels, Chats)
- **Requests**: Located in `src/Waha/Requests/` - Individual API endpoint implementations

### Key Components

1. **Service Provider**: `src/LaravelWahaSaloonSdkServiceProvider.php` - Registers the package with Laravel
2. **Facade**: `src/Facades/LaravelWahaSaloonSdk.php` - Provides static access to the SDK
3. **Config**: `config/waha-saloon-sdk.php` - Package configuration (requires `WAHA_BASE_URL` and optionally `WAHA_API_KEY` env vars)

### SDK Generation

The SDK is generated from a Postman collection using the `sdkgenerator` tool:
- Source: `WAHA - WhatsApp HTTP API - 2025.12.1.postman_collection.json`
- Output: `src/Waha/` directory
- Namespace: `CCK\LaravelWahaSaloonSdk\Waha`

**Important**: When regenerating the SDK, use `--force` flag to overwrite existing files. See "SDK Regeneration Workflow" section below for detailed steps.

## Code Standards

- **Style**: PSR-12 compliant, enforced by Laravel Pint
- **Static Analysis**: PHPStan level 5 with Laravel-specific rules
- **Testing Framework**: Pest PHP with Orchestra Testbench for Laravel package testing
- **PHP Version**: Requires PHP 8.4+
- **Laravel Versions**: Supports Laravel 10.x, 11.x, and 12.x

## Development Workflow

1. Make changes to the code
2. Run `composer format` to fix code style
3. Run `composer analyse` to check for static analysis issues
4. Run `composer test` to ensure tests pass
5. If modifying the SDK structure, regenerate from Postman collection

## Testing

Tests are located in the `tests/` directory. The project uses Pest PHP with architecture tests that check:
- No debugging functions (dd, dump, ray) are left in code
- Code follows PSR standards

To run a single test:
```bash
./vendor/bin/pest tests/path/to/specific/test.php
```

## Important Notes

1. **Generated Code**: The `src/Waha/` directory contains auto-generated code. Manual modifications will be lost when regenerating from Postman.
2. **Request Naming**: Request classes use very descriptive names that match the API functionality (e.g., `GetChatsOverviewIncludesAllNecessaryThingsToBuildUiYourChatsOverviewPageChatIdNamePictureLastMessageSortingByLastMessageTimestamp`)
3. **Empty Implementation**: The main `LaravelWahaSaloonSdk` class is currently empty - the SDK functionality is accessed through the Waha connector directly
4. **Configuration**: Always ensure `WAHA_BASE_URL` is set in the environment
5. **Authentication**: The SDK supports API key authentication:
   - Set `WAHA_API_KEY` in your `.env` file
   - The SDK automatically includes the `X-Api-Key` header when the API key is configured
   - About 50% of WAHA endpoints require authentication (135 out of 271 endpoints)
   - If no API key is provided, requests will still be sent without authentication headers

## Common Tasks

### Adding a New Resource
1. Create a new resource class in `src/Waha/Resource/`
2. Add the resource method to the `Waha` connector
3. Follow the existing pattern of other resources

### Adding a New Request
1. Create a new request class in `src/Waha/Requests/`
2. Extend `Saloon\Http\Request`
3. Define the HTTP method and endpoint
4. Add to the appropriate resource

### Modifying the SDK Structure
1. Update the Postman collection
2. Run `composer build-from-postman`
3. Review generated changes
4. Update tests as needed

### Using Authentication
```php
// Authentication is automatic when WAHA_API_KEY is set in .env
$waha = new \CCK\LaravelWahaSaloonSdk\Waha\Waha();

// Or manually provide API key
$waha = new \CCK\LaravelWahaSaloonSdk\Waha\Waha(
    baseUrl: 'https://your-waha-instance.com',
    apiKey: 'your-api-key'
);
```

## SDK Regeneration Workflow

When WAHA updates their API and releases a new Postman collection, follow this workflow to update the SDK.

### Custom Code to PRESERVE

These files contain custom code that will be overwritten during regeneration. **You must restore them after running `composer build-from-postman`:**

1. **`src/Waha/Waha.php`** - Custom constructor with config fallback and API key headers:
   ```php
   public function __construct(
       public string $baseUrl = '',
       protected ?string $apiKey = null,
   ) {
       if ($this->baseUrl === '' && function_exists('config')) {
           $this->baseUrl = config('waha-saloon-sdk.connections.default.base_url')
               ?? config('waha-saloon-sdk.base_url')
               ?? '';
       }
       if ($this->apiKey === null && function_exists('config')) {
           $this->apiKey = config('waha-saloon-sdk.connections.default.api_key')
               ?? config('waha-saloon-sdk.api_key')
               ?? null;
       }
   }

   protected function defaultHeaders(): array
   {
       $headers = [];
       if ($this->apiKey) {
           $headers['X-Api-Key'] = $this->apiKey;
       }
       return $headers;
   }
   ```

2. **`src/Waha/Resource/Qr.php`** - Convenience methods for QR code retrieval:
   - `getQrCodeImage(string $session)` - Returns binary PNG
   - `getQrCodeBase64(string $session)` - Returns JSON with base64 image
   - `getQrCodeRaw(string $session)` - Returns raw QR value

3. **`src/Waha/Requests/Qr/GetQrCodeForPairingWhatsAppApi.php`** - Accept header support:
   - `$acceptHeader` constructor parameter
   - `defaultHeaders()` method for Accept header
   - Static factory methods: `forBinaryImage()`, `forBase64Image()`, `forRawValue()`

### Issues to FIX After Regeneration

1. **Response Import**: The generator uses `Saloon\Contracts\Response` but should be `Saloon\Http\Response`
   ```bash
   # Fix all Resource files
   find src/Waha -name "*.php" -exec sed -i '' 's/use Saloon\\Contracts\\Response;/use Saloon\\Http\\Response;/g' {} +
   ```

2. **Missing HasBody Interface**: Request classes with `defaultBody()` need `HasBody` interface and `HasJsonBody` trait
   ```bash
   # Find affected files
   for file in $(grep -rl "function defaultBody" src/Waha/Requests/); do
     if ! grep -q "implements HasBody" "$file"; then
       echo "$file"
     fi
   done
   ```

3. **Property Name Conflicts**: Some generated properties conflict with Saloon base class:
   - `$config` → rename to `$appConfig` or `$sessionConfig`
   - `$method` → rename to `$authMethod`
   - `$body` → rename to `$messageBody`

4. **Deprecated Endpoints**: Remove from Postman collection BEFORE generating (e.g., GET sendText was deprecated)

### Files to UPDATE

1. **`composer.json`** - Update build script path to new collection filename
2. **`src/Facades/Waha.php`** - Update `@method` docblocks if resource names change
3. **`phpstan-baseline.neon`** - Regenerate: `vendor/bin/phpstan analyse --generate-baseline`

### Regeneration Checklist

```bash
# 1. Download new Postman collection to project root

# 2. Edit collection to remove deprecated endpoints (check WAHA changelog)

# 3. Update composer.json build script path
#    "build-from-postman": "sdkgenerator generate:sdk \"NEW_COLLECTION.json\" ..."

# 4. Regenerate SDK
composer build-from-postman

# 5. Restore custom code in Waha.php, Qr.php, GetQrCodeForPairingWhatsAppApi.php

# 6. Fix Response imports
find src/Waha -name "*.php" -exec sed -i '' 's/use Saloon\\Contracts\\Response;/use Saloon\\Http\\Response;/g' {} +

# 7. Fix missing HasBody interfaces (check and fix manually)

# 8. Fix property conflicts (check PHPStan output)

# 9. Quality checks
composer format
composer analyse  # Regenerate baseline if needed
composer test

# 10. Delete old collection file, commit, and tag new version
```