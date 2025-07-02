<?php

namespace CCK\LaravelWahaSaloonSdk\Waha;

use CCK\LaravelWahaSaloonSdk\Waha\Resource\Admin;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Api;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Auth;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Channels;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Chats;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Contacts;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Groups;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\InfoAdminOnly;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\InviteCode;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Labels;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Lids;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Messages;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\MessagesAdminOnly;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Misc;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Overview;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Participants;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Picture;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Presence;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Profile;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Search;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Send;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\SendText;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Server;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Sessions;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Status;
use Saloon\Http\Connector;

/**
 * WAHA - WhatsApp HTTP API - 2025.5
 */
class Waha extends Connector
{
    public string $baseUrl = '';

    public function __construct($baseUrl = null)
    {
        $this->baseUrl = $baseUrl ?? config('waha-saloon-sdk.base_url');
    }

    public function resolveBaseUrl(): string
    {
        return $this->baseUrl;
    }

    public function admin(): Admin
    {
        return new Admin($this);
    }

    public function api(): Api
    {
        return new Api($this);
    }

    public function auth(): Auth
    {
        return new Auth($this);
    }

    public function channels(): Channels
    {
        return new Channels($this);
    }

    public function chats(): Chats
    {
        return new Chats($this);
    }

    public function contacts(): Contacts
    {
        return new Contacts($this);
    }

    public function groups(): Groups
    {
        return new Groups($this);
    }

    public function infoAdminOnly(): InfoAdminOnly
    {
        return new InfoAdminOnly($this);
    }

    public function inviteCode(): InviteCode
    {
        return new InviteCode($this);
    }

    public function labels(): Labels
    {
        return new Labels($this);
    }

    public function lids(): Lids
    {
        return new Lids($this);
    }

    public function messages(): Messages
    {
        return new Messages($this);
    }

    public function messagesAdminOnly(): MessagesAdminOnly
    {
        return new MessagesAdminOnly($this);
    }

    public function misc(): Misc
    {
        return new Misc($this);
    }

    public function overview(): Overview
    {
        return new Overview($this);
    }

    public function participants(): Participants
    {
        return new Participants($this);
    }

    public function picture(): Picture
    {
        return new Picture($this);
    }

    public function presence(): Presence
    {
        return new Presence($this);
    }

    public function profile(): Profile
    {
        return new Profile($this);
    }

    public function search(): Search
    {
        return new Search($this);
    }

    public function send(): Send
    {
        return new Send($this);
    }

    public function sendText(): SendText
    {
        return new SendText($this);
    }

    public function server(): Server
    {
        return new Server($this);
    }

    public function sessions(): Sessions
    {
        return new Sessions($this);
    }

    public function status(): Status
    {
        return new Status($this);
    }
}
