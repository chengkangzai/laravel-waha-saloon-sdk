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
- Source: `WAHA - WhatsApp HTTP API - 2025.5.postman_collection.json`
- Output: `src/Waha/` directory
- Namespace: `CCK\LaravelWahaSaloonSdk\Waha`

**Important**: When regenerating the SDK, use `--force` flag to overwrite existing files.

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