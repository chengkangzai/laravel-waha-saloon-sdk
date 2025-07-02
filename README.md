# Laravel WAHA Saloon SDK

[![Latest Version on Packagist](https://img.shields.io/packagist/v/chengkangzai/laravel-waha-saloon-sdk.svg?style=flat-square)](https://packagist.org/packages/chengkangzai/laravel-waha-saloon-sdk)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/chengkangzai/laravel-waha-saloon-sdk/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/chengkangzai/laravel-waha-saloon-sdk/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/chengkangzai/laravel-waha-saloon-sdk/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/chengkangzai/laravel-waha-saloon-sdk/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/chengkangzai/laravel-waha-saloon-sdk.svg?style=flat-square)](https://packagist.org/packages/chengkangzai/laravel-waha-saloon-sdk)

A comprehensive Laravel package that provides a PHP SDK for the [WAHA (WhatsApp HTTP API)](https://waha.devlike.pro/) service. This SDK is auto-generated from the WAHA Postman collection and wrapped with [SaloonPHP](https://docs.saloon.dev/) for elegant HTTP client functionality.

## What is WAHA?

WAHA (WhatsApp HTTP API) is a service that provides HTTP RESTful API access to WhatsApp. It allows you to:
- Send and receive WhatsApp messages programmatically
- Manage WhatsApp sessions and authentication
- Handle contacts, groups, and channels
- Implement WhatsApp business features in your application

This SDK makes it easy to integrate WAHA with your Laravel application, providing a fluent, type-safe interface to all WAHA API endpoints.

## Features

- 🚀 Auto-generated from WAHA Postman collection
- 🔌 Elegant HTTP client powered by SaloonPHP
- 📦 Laravel integration with service provider and facade
- 🛠️ Comprehensive API coverage with 23 resources and 134 request types
- 🔐 Built-in API key authentication support
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
php artisan vendor:publish --tag="waha-saloon-sdk-config"
```

This is the contents of the published config file:

```php
return [
    'base_url' => env('WAHA_BASE_URL', ''),
    'api_key' => env('WAHA_API_KEY', ''),
];
```

## Configuration

Set your WAHA instance URL and API key in your `.env` file:

```bash
WAHA_BASE_URL=https://your-waha-instance.com
WAHA_API_KEY=your-api-key-here
```

The API key is optional but required for most WAHA endpoints (approximately 50% of endpoints require authentication). If not provided, requests will be sent without authentication headers.

## Usage

### Quick Start Example

Here's a complete example showing how to send your first WhatsApp message:

```php
<?php

use CCK\LaravelWahaSaloonSdk\Waha\Waha;

// 1. Create a WAHA client instance
$waha = new Waha();

// 2. Start a WhatsApp session (you'll need to scan QR code first time)
$sessionResponse = $waha->sessions()->startTheSession('default');

// 3. Send a text message
$messageResponse = $waha->sendText()->sendTextMessage(
    chatId: '1234567890@c.us', // WhatsApp number with @c.us suffix
    text: 'Hello from Laravel WAHA SDK!',
    session: 'default',
    replyTo: null,
    linkPreview: null,
    linkPreviewHighQuality: null
);

// 4. Check if message was sent successfully
if ($messageResponse->successful()) {
    $messageData = $messageResponse->json();
    echo "Message sent! ID: " . $messageData['id'];
} else {
    echo "Failed to send message: " . $messageResponse->body();
}
```

### Basic Usage Patterns

```php
use CCK\LaravelWahaSaloonSdk\Waha\Waha;

// Create a new WAHA client with default config (uses env vars)
$waha = new Waha();

// Or with a custom base URL and API key (overrides config)
$waha = new Waha(
    baseUrl: 'https://your-waha-instance.com',
    apiKey: 'your-api-key'
);

// Access different resources - each resource groups related API endpoints
$sessions = $waha->sessions();    // Session management
$chats = $waha->chats();         // Limited chat operations
$messages = $waha->sendText();   // Send text messages
$misc = $waha->misc();           // Most functionality (files, media, groups, etc.)
$contacts = $waha->contacts();   // Contact management
$overview = $waha->overview();   // Chat overview
```

### Working with Sessions

Sessions are the foundation of WhatsApp communication. Each session represents a WhatsApp connection.

```php
// Get all active sessions (using misc resource)
$response = $waha->misc()->listAllSessions(null);
$sessions = $response->json();
foreach ($sessions as $session) {
    echo "Session: {$session['name']}, Status: {$session['status']}\n";
}

// Get detailed information about a specific session
$response = $waha->sessions()->getSessionInformation('default');
if ($response->successful()) {
    $session = $response->json();
    echo "Session Status: {$session['status']}\n";
    echo "Session Config: " . json_encode($session['config']) . "\n";
}

// Start a new session (first time requires QR code scanning)
$response = $waha->sessions()->startTheSession('default');
if ($response->successful()) {
    echo "Session started successfully\n";
    // You may need to scan QR code if this is the first time
}

// Stop an active session
$response = $waha->sessions()->stopTheSession('default');
if ($response->successful()) {
    echo "Session stopped successfully\n";
}

// Get QR code for authentication
$response = $waha->auth()->getQrCodeForPairingWhatsAppApi('default');
if ($response->successful()) {
    $qr = $response->json();
    echo "QR Code: {$qr['qr']}\n";
}
```

### Sending Messages

The SDK provides specialized resources for different message types. Here are comprehensive examples:

```php
// Send a simple text message
$response = $waha->sendText()->sendTextMessage(
    chatId: '1234567890@c.us', // Individual chat
    text: 'Hello from Laravel WAHA SDK!',
    session: 'default',
    replyTo: null,
    linkPreview: null,
    linkPreviewHighQuality: null
);

// Send an image with caption (using misc resource)
$response = $waha->misc()->sendImage(
    chatId: '1234567890@c.us',
    file: 'https://example.com/image.jpg', // URL or base64
    session: 'default',
    replyTo: null,
    caption: 'Check out this amazing image! 📸'
);

// Send an image from local file (base64)
$imageBase64 = base64_encode(file_get_contents('/path/to/image.jpg'));
$response = $waha->misc()->sendImage(
    chatId: '1234567890@c.us',
    file: $imageBase64,
    session: 'default',
    replyTo: null,
    caption: 'Image from server storage'
);

// Send a document/file
$response = $waha->misc()->sendFile(
    chatId: '1234567890@c.us',
    file: 'https://example.com/document.pdf', // URL or base64
    session: 'default',
    replyTo: null,
    caption: 'Important document'
);

// Send a video with caption
$response = $waha->misc()->sendVideo(
    chatId: '1234567890@c.us',
    file: 'https://example.com/video.mp4',
    session: 'default',
    replyTo: null,
    asNote: false,
    caption: 'Watch this tutorial video!'
);

// Send voice message
$response = $waha->misc()->sendVoiceMessage(
    chatId: '1234567890@c.us',
    file: 'https://example.com/audio.ogg', // URL or base64
    session: 'default',
    replyTo: null
);

// Send location
$response = $waha->misc()->chattingControllerSendLocation(
    chatId: '1234567890@c.us',
    latitude: 37.7749,
    longitude: -122.4194,
    title: 'San Francisco Office',
    session: 'default',
    replyTo: null
);

// Send a poll
$pollData = [
    'name' => 'What\'s your favorite programming language?',
    'options' => ['PHP', 'JavaScript', 'Python', 'Java'],
    'selectableCount' => 1 // 1 for single choice, >1 for multiple
];
$response = $waha->misc()->sendPollWithOptions(
    chatId: '1234567890@c.us',
    poll: $pollData,
    session: 'default',
    replyTo: null
);

// Check message delivery status
if ($response->successful()) {
    $messageData = $response->json();
    echo "Message sent successfully!\n";
    echo "Message ID: {$messageData['id']}\n";
    echo "Timestamp: {$messageData['timestamp']}\n";
} else {
    echo "Failed to send message: {$response->status()}\n";
    echo "Error: {$response->body()}\n";
}
```

### Working with Chats

Chats represent conversations with individuals or groups. Here's how to manage them:

```php
// Get overview of all chats (includes last message, unread count, etc.)
$response = $waha->overview()->getChatsOverviewIncludesAllNecessaryThingsToBuildUiYourChatsOverviewPageChatIdNamePictureLastMessageSortingByLastMessageTimestamp(
    session: 'default',
    limit: null,
    offset: null,
    ids: null
);
$chats = $response->json();

foreach ($chats as $chat) {
    echo "Chat: {$chat['id']}\n";
    echo "Name: {$chat['name']}\n";
    echo "Last Message: {$chat['lastMessage']['body']}\n";
    echo "Unread Count: {$chat['unreadCount']}\n";
    echo "---\n";
}

// Get basic chat list
$response = $waha->misc()->getChats(
    session: 'default',
    sortBy: 'lastMessageTimestamp',
    sortOrder: 'desc',
    limit: '50',
    offset: '0'
);
$chatList = $response->json();

// Get messages from a specific chat with pagination
$response = $waha->chats()->getsMessagesInTheChat(
    session: 'default',
    chatId: '1234567890@c.us',
    downloadMedia: 'true',
    limit: '50',
    offset: null,
    filterTimestampLte: null,
    filterTimestampGte: null,
    filterFromMe: null,
    filterAck: null
);
$messages = $response->json();

foreach ($messages as $message) {
    echo "From: {$message['from']}\n";
    echo "Text: {$message['body']}\n";
    echo "Time: {$message['timestamp']}\n";
    echo "Type: {$message['type']}\n"; // text, image, video, etc.
    echo "---\n";
}

// Mark chat as read
$response = $waha->chats()->readUnreadMessagesInTheChat(
    session: 'default',
    chatId: '1234567890@c.us',
    messages: null,
    days: null
);

// Delete a specific message
$response = $waha->messages()->deletesMessageFromTheChat(
    session: 'default',
    chatId: '1234567890@c.us',
    messageId: 'message_id_here'
);

// Clear all messages in a chat
$response = $waha->chats()->clearsAllMessagesFromTheChat(
    session: 'default',
    chatId: '1234567890@c.us'
);

// Archive/unarchive a chat
$response = $waha->api()->archiveTheChat(
    session: 'default',
    chatId: '1234567890@c.us'
);

$response = $waha->api()->unarchiveTheChat(
    session: 'default',
    chatId: '1234567890@c.us'
);
```

### Working with Contacts

Manage your WhatsApp contacts and verify phone numbers:

```php
// Get all contacts from the session
$response = $waha->contacts()->getAllContacts('default');
$contacts = $response->json();

foreach ($contacts as $contact) {
    echo "Name: {$contact['name']}\n";
    echo "Number: {$contact['id']}\n";
    echo "Is Business: " . ($contact['isBusiness'] ? 'Yes' : 'No') . "\n";
    echo "---\n";
}

// Get detailed information about a specific contact
$response = $waha->contacts()->getContactBasicInfo(
    session: 'default',
    contactId: '1234567890@c.us'
);
$contact = $response->json();

echo "Contact Name: {$contact['name']}\n";
echo "Push Name: {$contact['pushname']}\n";

// Get contact's about info
$response = $waha->contacts()->getsTheContactAboutInfo(
    session: 'default',
    contactId: '1234567890@c.us'
);
$about = $response->json();

// Check if a phone number exists on WhatsApp
$response = $waha->contacts()->checkPhoneNumberIsRegisteredInWhatsApp(
    session: 'default',
    phone: '1234567890'
);
$result = $response->json();

if ($result['numberExists']) {
    echo "Number exists on WhatsApp\n";
    echo "WhatsApp ID: {$result['numberExists']}\n";
} else {
    echo "Number does not exist on WhatsApp\n";
}

// You can also use misc resource to check number status
$response = $waha->misc()->checkNumberStatus(
    phone: '1234567890',
    session: 'default'
);

// Get contact's profile picture
$response = $waha->contacts()->getContactProfilePictureUrl(
    session: 'default',
    contactId: '1234567890@c.us'
);
$profilePic = $response->json();

// Block a contact
$response = $waha->contacts()->blockContact(
    session: 'default',
    contactId: '1234567890@c.us'
);

// Unblock a contact
$response = $waha->contacts()->unblockContact(
    session: 'default',
    contactId: '1234567890@c.us'
);
```

### Working with Groups

Manage WhatsApp groups and their participants:

```php
// Get all groups you're part of
$response = $waha->misc()->getAllGroups(
    session: 'default',
    sortBy: null,
    sortOrder: null,
    limit: null,
    offset: null,
    exclude: null
);
$groups = $response->json();

foreach ($groups as $group) {
    echo "Group: {$group['name']}\n";
    echo "ID: {$group['id']}\n";
    echo "Participants: " . count($group['participants']) . "\n";
    echo "Description: {$group['description']}\n";
    echo "---\n";
}

// Create a new group
$response = $waha->misc()->createNewGroup(
    session: 'default',
    name: 'Laravel Developers',
    participants: ['1234567890@c.us', '0987654321@c.us']
);

if ($response->successful()) {
    $group = $response->json();
    echo "Group created: {$group['id']}\n";
}

// Get detailed group information
$response = $waha->groups()->getTheGroup(
    session: 'default',
    groupId: 'group_id@g.us'
);
$groupDetails = $response->json();

// Add participants to a group (admin only)
$response = $waha->participants()->addParticipants(
    session: 'default',
    groupId: 'group_id@g.us',
    participants: ['1234567890@c.us', '5555555555@c.us']
);

// Remove participants from a group (admin only)
$response = $waha->participants()->removeParticipants(
    session: 'default',
    groupId: 'group_id@g.us',
    participants: ['1234567890@c.us']
);

// Promote participants to admin
$response = $waha->admin()->promoteParticipantsToAdminUsers(
    session: 'default',
    groupId: 'group_id@g.us',
    participants: ['1234567890@c.us']
);

// Demote admins to regular participants
$response = $waha->admin()->demotesParticipantsToRegularUsers(
    session: 'default',
    groupId: 'group_id@g.us',
    participants: ['1234567890@c.us']
);

// Update group settings
$response = $waha->groups()->updatesTheGroupSubject(
    session: 'default',
    groupId: 'group_id@g.us',
    subject: 'New Group Name'
);

$response = $waha->groups()->updatesTheGroupDescription(
    session: 'default',
    groupId: 'group_id@g.us',
    description: 'This is our updated group description'
);

// Leave a group
$response = $waha->groups()->leaveTheGroup(
    session: 'default',
    groupId: 'group_id@g.us'
);

// Get group invitation link (admin only)
$response = $waha->inviteCode()->getsTheInviteCodeForTheGroup(
    session: 'default',
    groupId: 'group_id@g.us'
);
$inviteCode = $response->json();
echo "Invite link: https://chat.whatsapp.com/{$inviteCode['code']}\n";

// Revoke group invitation link (admin only)
$response = $waha->inviteCode()->invalidatesTheCurrentGroupInviteCodeAndGeneratesNewOne(
    session: 'default',
    groupId: 'group_id@g.us'
);
```

### Advanced Message Operations

```php
// React to a message with emoji
$response = $waha->misc()->reactToMessageWithEmoji(
    messageId: 'message_id_here',
    reaction: '👍',
    session: 'default'
);

// Forward a message
$response = $waha->misc()->chattingControllerForwardMessage(
    chatId: '1234567890@c.us',
    messageId: 'message_id_to_forward',
    session: 'default'
);

// Send contact vCard
$contacts = [
    [
        'id' => '1234567890@c.us',
        'name' => 'John Doe'
    ]
];
$response = $waha->misc()->chattingControllerSendContactVcard(
    chatId: '1234567890@c.us',
    contacts: $contacts,
    session: 'default',
    replyTo: null
);

// Set typing indicator
$response = $waha->misc()->chattingControllerStartTyping(
    chatId: '1234567890@c.us',
    session: 'default'
);

// Stop typing indicator
$response = $waha->misc()->chattingControllerStopTyping(
    chatId: '1234567890@c.us',
    session: 'default'
);

// Mark messages as seen
$response = $waha->misc()->chattingControllerSendSeen(
    chatId: '1234567890@c.us',
    session: 'default',
    messageId: 'message_id_here',
    messageIds: null,
    participant: null
);

// Send interactive buttons message
$response = $waha->misc()->sendButtonsInteractiveMessage(
    chatId: '1234567890@c.us',
    header: 'Choose an option',
    body: 'Please select one of the following:',
    footer: 'Powered by WAHA',
    buttons: [
        ['id' => 'btn1', 'title' => 'Option 1'],
        ['id' => 'btn2', 'title' => 'Option 2']
    ],
    session: 'default',
    headerImage: null
);
```

### Advanced Features

```php
// Take a screenshot of the WhatsApp web interface
$response = $waha->misc()->screenshotControllerScreenshot('default');
$screenshot = $response->json();
echo "Screenshot saved\n";

// Set presence status (online, offline, typing, recording)
$response = $waha->misc()->setSessionPresence(
    session: 'default',
    chatId: '1234567890@c.us',
    presence: 'typing' // online, offline, typing, recording
);

// Get presence status of a contact
$response = $waha->presence()->getThePresenceForTheChatIdIfItHasntBeenSubscribedItAlsoSubscribesToIt(
    session: 'default',
    chatId: '1234567890@c.us'
);
$presence = $response->json();

// Subscribe to presence events
$response = $waha->presence()->subscribeToPresenceEventsForTheChat(
    session: 'default',
    chatId: '1234567890@c.us'
);

// Health check
$response = $waha->misc()->checkTheHealthOfTheServer();
$health = $response->json();
echo "Service status: healthy\n";

// Ping the server
$response = $waha->misc()->pingTheServer();
echo "Server is responding\n";

// Get WAHA version
$response = $waha->misc()->getTheServerVersion();
$version = $response->json();
echo "WAHA Version: {$version['version']}\n";

// Get server environment
$response = $waha->server()->getTheServerEnvironment();
$env = $response->json();
echo "Environment: {$env['env']}\n";

// Get server status
$response = $waha->server()->getTheServerStatus();
$status = $response->json();
```

### Error Handling and Best Practices

```php
use CCK\LaravelWahaSaloonSdk\Waha\Waha;
use Saloon\Exceptions\Request\RequestException;

try {
    $waha = new Waha();
    
    // Always check session status before sending messages
    $sessionResponse = $waha->sessions()->getSessionInformation('default');
    $sessionData = $sessionResponse->json();
    
    if ($sessionData['status'] !== 'WORKING') {
        throw new Exception("Session not ready. Status: {$sessionData['status']}");
    }
    
    // Send message with error handling
    $response = $waha->sendText()->sendTextMessage(
        chatId: '1234567890@c.us',
        text: 'Hello from Laravel!',
        session: 'default',
        replyTo: null,
        linkPreview: null,
        linkPreviewHighQuality: null
    );
    
    if (!$response->successful()) {
        throw new Exception("Failed to send message: {$response->body()}");
    }
    
    $messageData = $response->json();
    echo "Message sent successfully! ID: {$messageData['id']}\n";
    
} catch (RequestException $e) {
    // Handle HTTP request errors
    echo "Request failed: {$e->getMessage()}\n";
    echo "Response: {$e->getResponse()->body()}\n";
} catch (Exception $e) {
    // Handle other errors
    echo "Error: {$e->getMessage()}\n";
}
```

### Available Resources

The SDK provides access to all WAHA API endpoints through these resources:

- **Admin** (`$waha->admin()`) - Admin operations (promote/demote participants)
- **Api** (`$waha->api()`) - Basic API operations (archive/unarchive chats)
- **Auth** (`$waha->auth()`) - Authentication and QR codes  
- **Channels** (`$waha->channels()`) - Channel management
- **Chats** (`$waha->chats()`) - Limited chat operations (get messages, clear, mark read)
- **Contacts** (`$waha->contacts()`) - Contact management  
- **Groups** (`$waha->groups()`) - Group information and settings
- **InfoAdminOnly** (`$waha->infoAdminOnly()`) - Admin-only group settings
- **InviteCode** (`$waha->inviteCode()`) - Group invitation codes
- **Labels** (`$waha->labels()`) - Label management
- **Lids** (`$waha->lids()`) - LID (LinkedIn ID) management
- **Messages** (`$waha->messages()`) - Message operations (delete, edit, pin)
- **MessagesAdminOnly** (`$waha->messagesAdminOnly()`) - Admin-only message settings
- **Misc** (`$waha->misc()`) - **Main resource** with most functionality (send files, media, groups, sessions, health checks, etc.)
- **Overview** (`$waha->overview()`) - Chat overview and summaries
- **Participants** (`$waha->participants()`) - Group participant management
- **Picture** (`$waha->picture()`) - Profile and group picture management
- **Presence** (`$waha->presence()`) - Online/offline status
- **Profile** (`$waha->profile()`) - Profile management
- **Search** (`$waha->search()`) - Channel search functionality
- **Send** (`$waha->sending()`) - Advanced sending (link previews, button replies)
- **SendText** (`$waha->sendText()`) - Text message sending
- **Server** (`$waha->server()`) - Server information and control
- **Sessions** (`$waha->sessions()`) - Session management
- **Status** (`$waha->status()`) - WhatsApp status updates

**Note**: Most of the core functionality (sending media, files, managing groups, health checks, etc.) is in the `misc()` resource.

### Understanding WhatsApp IDs and Important Notes

WhatsApp uses specific ID formats:
- **Individual chats**: `1234567890@c.us` (phone number + @c.us)
- **Group chats**: `1234567890-1234567890@g.us` (group ID + @g.us)  
- **Channels**: `1234567890@newsletter` (channel ID + @newsletter)

Phone numbers should include country code without '+' symbol.

### SDK Structure Notes

**Important**: This SDK is auto-generated from a Postman collection, which results in some unique characteristics:

1. **Very descriptive method names**: Methods have extremely long, descriptive names that match the API functionality exactly (e.g., `getChatsOverviewIncludesAllNecessaryThingsToBuildUiYourChatsOverviewPageChatIdNamePictureLastMessageSortingByLastMessageTimestamp`)

2. **Most functionality is in `misc()` resource**: Unlike typical SDKs where functionality is spread across logical resources, most operations (sending files, media, groups, health checks) are located in the `misc()` resource.

3. **Parameter order**: Pay close attention to parameter order in method calls, as it may not always be intuitive.

4. **Auto-generated code**: The SDK is regenerated from the Postman collection, so method signatures are exactly as defined in the WAHA API.

For the most up-to-date method signatures and parameters, always refer to the actual class files in `src/Waha/Resource/` or use your IDE's autocomplete functionality.

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
