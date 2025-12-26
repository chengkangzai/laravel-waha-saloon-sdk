<?php

namespace CCK\LaravelWahaSaloonSdk\Facades;

use CCK\LaravelWahaSaloonSdk\Waha\Resource\Admin;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Api;
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
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Qr;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Search;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Send;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\SendText;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Server;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Sessions;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Status;
use CCK\LaravelWahaSaloonSdk\Waha\Waha as WahaConnector;
use CCK\LaravelWahaSaloonSdk\WahaManager;
use Illuminate\Support\Facades\Facade;

/**
 * @method static WahaConnector connection(?string $name = null)
 * @method static string getDefaultConnection()
 * @method static void setDefaultConnection(string $name)
 * @method static void purge(?string $name = null)
 * @method static void purgeAll()
 * @method static array<string, WahaConnector> getConnections()
 * @method static Admin admin()
 * @method static Api api()
 * @method static Qr qr()
 * @method static Channels channels()
 * @method static Chats chats()
 * @method static Contacts contacts()
 * @method static Groups groups()
 * @method static InfoAdminOnly infoAdminOnly()
 * @method static InviteCode inviteCode()
 * @method static Labels labels()
 * @method static Lids lids()
 * @method static Messages messages()
 * @method static MessagesAdminOnly messagesAdminOnly()
 * @method static Misc misc()
 * @method static Overview overview()
 * @method static Participants participants()
 * @method static Picture picture()
 * @method static Presence presence()
 * @method static Profile profile()
 * @method static Search search()
 * @method static Send sending()
 * @method static SendText sendText()
 * @method static Server server()
 * @method static Sessions sessions()
 * @method static Status status()
 *
 * @see WahaManager
 */
class Waha extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return WahaManager::class;
    }
}
