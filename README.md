# Laravel WAHA Saloon SDK

[![Latest Version on Packagist](https://img.shields.io/packagist/v/chengkangzai/laravel-waha-saloon-sdk.svg?style=flat-square)](https://packagist.org/packages/chengkangzai/laravel-waha-saloon-sdk)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/chengkangzai/laravel-waha-saloon-sdk/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/chengkangzai/laravel-waha-saloon-sdk/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/chengkangzai/laravel-waha-saloon-sdk/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/chengkangzai/laravel-waha-saloon-sdk/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/chengkangzai/laravel-waha-saloon-sdk.svg?style=flat-square)](https://packagist.org/packages/chengkangzai/laravel-waha-saloon-sdk)

A Laravel package that provides a PHP SDK for the [WAHA (WhatsApp HTTP API)](https://waha.devlike.pro/) service. This SDK is auto-generated from the WAHA Postman collection and wrapped with [SaloonPHP](https://docs.saloon.dev/) for elegant HTTP client functionality.

## Features

- 🚀 Auto-generated from WAHA Postman collection
- 🔌 Elegant HTTP client powered by SaloonPHP
- 📦 Laravel integration with service provider and facade
- 🛠️ Comprehensive API coverage with 23 resources and 134 request types
- 🧪 Built with testing in mind using Pest PHP
- 🎯 Type-safe request and response handling
- 📋 Support for Laravel 10.x, 11.x, and 12.x

## Installation

You can install the package via composer:

```bash
composer require chengkangzai/laravel-waha-saloon-sdk
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="laravel-waha-saloon-sdk-config"
```

This is the contents of the published config file:

```php
return [
    'base_url' => env('WAHA_BASE_URL'),
];
```

## Configuration

Set your WAHA instance URL in your `.env` file:

```bash
WAHA_BASE_URL=https://your-waha-instance.com
```

## Usage

### Basic Usage

```php
use CCK\LaravelWahaSaloonSdk\Waha\Waha;

// Create a new WAHA client
$waha = new Waha();

// Or with a custom base URL
$waha = new Waha('https://your-waha-instance.com');

// Access different resources
$sessions = $waha->sessions();
$chats = $waha->chats();
$messages = $waha->send();
```

### Working with Sessions

```php
// Get all sessions
$response = $waha->sessions()->getAll();
$sessions = $response->json();

// Get a specific session
$response = $waha->sessions()->getSession('default');
$session = $response->json();

// Start a session
$response = $waha->sessions()->startSession('default');

// Stop a session
$response = $waha->sessions()->stopSession('default');
```

### Sending Messages

```php
// Send a text message
$response = $waha->sendText()->sendTextMessage(
    session: 'default',
    chatId: '1234567890@c.us',
    text: 'Hello from Laravel!'
);

// Send an image
$response = $waha->sendImage()->sendImageViaUrl(
    session: 'default',
    chatId: '1234567890@c.us',
    url: 'https://example.com/image.jpg',
    caption: 'Check out this image!'
);

// Send a file
$response = $waha->sendFile()->sendFileViaUrl(
    session: 'default',
    chatId: '1234567890@c.us',
    url: 'https://example.com/document.pdf',
    fileName: 'document.pdf'
);
```

### Working with Chats

```php
// Get all chats
$response = $waha->chats()->getChatsOverview();
$chats = $response->json();

// Get messages from a chat
$response = $waha->chats()->getChatMessages(
    session: 'default',
    chatId: '1234567890@c.us',
    limit: 100
);
$messages = $response->json();

// Delete a message
$response = $waha->chats()->deleteMessage(
    session: 'default',
    chatId: '1234567890@c.us',
    messageId: 'message_id_here'
);
```

### Working with Contacts

```php
// Get all contacts
$response = $waha->contacts()->getAll('default');
$contacts = $response->json();

// Get contact info
$response = $waha->contacts()->getContact(
    session: 'default',
    contactId: '1234567890@c.us'
);
$contact = $response->json();

// Check if number exists on WhatsApp
$response = $waha->contacts()->checkNumberExists(
    session: 'default',
    phone: '+1234567890'
);
$exists = $response->json();
```

### Working with Groups

```php
// Get all groups
$response = $waha->groups()->getAll('default');
$groups = $response->json();

// Create a group
$response = $waha->groups()->createGroup(
    session: 'default',
    name: 'My New Group',
    participants: ['1234567890@c.us', '0987654321@c.us']
);

// Add participants to a group
$response = $waha->groups()->addParticipants(
    id: 'group_id@g.us',
    session: 'default',
    participants: ['1234567890@c.us']
);
```

### Available Resources

The SDK provides access to all WAHA API endpoints through these resources:

- **Admin** - Version info and environment details
- **Auth** - Authentication and QR codes
- **Channels** - Channel management
- **Chats** - Chat and message operations
- **Contacts** - Contact management
- **Groups** - Group management
- **Health** - Health checks
- **Labels** - Label management
- **Misc** - Miscellaneous operations
- **Presence** - Online/offline status
- **Screenshot** - Take screenshots
- **Send** - Send messages (various types)
- **SendFile** - Send files
- **SendImage** - Send images
- **SendLocation** - Send locations
- **SendPoll** - Send polls
- **SendText** - Send text messages
- **SendVideo** - Send videos
- **SendVoice** - Send voice messages
- **Sessions** - Session management
- **Status** - Status updates
- **Webhooks** - Webhook configuration

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Development

### Regenerating the SDK

The SDK is auto-generated from the WAHA Postman collection. To regenerate:

```bash
composer build-from-postman
```

### Code Quality

```bash
# Format code
composer format

# Run static analysis
composer analyse
```

## Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [CCK](https://github.com/chengkangzai)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
