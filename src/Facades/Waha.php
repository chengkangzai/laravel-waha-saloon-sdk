<?php

namespace CCK\LaravelWahaSaloonSdk\Facades;

use CCK\LaravelWahaSaloonSdk\Waha\Resource\About;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Add;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Admin;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\All;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Api;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Apps;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Archive;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\ArgentinePhoneNumbers;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Block;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\BrazilianPhoneNumbers;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\ByText;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\ByView;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Categories;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Channels;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Chats;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Chatwoot;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\CheckExists;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\CheckNumberStatus;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Contacts;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Count;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Countries;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Cpu;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Delete;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Demote;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Description;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Environment;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Events;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Follow;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\ForwardMessage;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Groups;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Health;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Heapsnapshot;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Image;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\InfoAdminOnly;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\InviteCode;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Join;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\JoinInfo;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\JoinRequests;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Keys;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Labels;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Leave;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Lids;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\LinkCustomPreview;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Locales;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Logout;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Mcp;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Me;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\MemberAddMode;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\MemberShareHistoryMode;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\MembershipApproval;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Messages;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\MessagesAdminOnly;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\MexicanPhoneNumbers;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Misc;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Mute;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Name;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\NewMessageId;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Overview;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Participants;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Passkey;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\PhoneNumbers;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Picture;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Pin;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Ping;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Pn;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Presence;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Preview;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Profile;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\ProfilePicture;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Promote;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Qr;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Reaction;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Read;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Refresh;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Reject;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Remove;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Reply;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\RequestCode;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Restart;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Revoke;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Screenshot;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Search;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Send;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\SendButtons;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\SendContactVcard;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\SendFile;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\SendImage;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\SendLinkPreview;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\SendList;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\SendLocation;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\SendPoll;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\SendPollVote;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\SendSeen;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\SendSticker;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\SendText;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\SendVideo;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\SendVoice;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Server;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Sessions;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Star;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Start;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\StartTyping;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Status;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Stop;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\StopTyping;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Subject;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Subscribe;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Text;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Trace;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Unarchive;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Unblock;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Unfollow;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Unmute;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Unpin;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Unread;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\V2;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Version;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Video;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Views;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Voice;
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
 * @method static About about()
 * @method static Add add()
 * @method static All all()
 * @method static Apps apps()
 * @method static Archive archive()
 * @method static Block block()
 * @method static ByText byText()
 * @method static ByView byView()
 * @method static Categories categories()
 * @method static CheckExists checkExists()
 * @method static CheckNumberStatus checkNumberStatus()
 * @method static Count count()
 * @method static Countries countries()
 * @method static Cpu cpu()
 * @method static Delete delete()
 * @method static Demote demote()
 * @method static Description description()
 * @method static Environment environment()
 * @method static Events events()
 * @method static Follow follow()
 * @method static ForwardMessage forwardMessage()
 * @method static Health health()
 * @method static Heapsnapshot heapsnapshot()
 * @method static Image image()
 * @method static Join join()
 * @method static JoinInfo joinInfo()
 * @method static Leave leave()
 * @method static LinkCustomPreview linkCustomPreview()
 * @method static Locales locales()
 * @method static Logout logout()
 * @method static Me me()
 * @method static Mute mute()
 * @method static Name name()
 * @method static NewMessageId newMessageId()
 * @method static Pin pin()
 * @method static Ping ping()
 * @method static Pn pn()
 * @method static Preview preview()
 * @method static ProfilePicture profilePicture()
 * @method static Promote promote()
 * @method static Reaction reaction()
 * @method static Read read()
 * @method static Refresh refresh()
 * @method static Reject reject()
 * @method static Remove remove()
 * @method static Reply reply()
 * @method static RequestCode requestCode()
 * @method static Restart restart()
 * @method static Revoke revoke()
 * @method static Screenshot screenshot()
 * @method static SendButtons sendButtons()
 * @method static SendContactVcard sendContactVcard()
 * @method static SendFile sendFile()
 * @method static SendImage sendImage()
 * @method static SendLinkPreview sendLinkPreview()
 * @method static SendList sendList()
 * @method static SendLocation sendLocation()
 * @method static SendPoll sendPoll()
 * @method static SendPollVote sendPollVote()
 * @method static SendSeen sendSeen()
 * @method static SendVideo sendVideo()
 * @method static SendVoice sendVoice()
 * @method static Star star()
 * @method static Start start()
 * @method static StartTyping startTyping()
 * @method static Stop stop()
 * @method static StopTyping stopTyping()
 * @method static Subject subject()
 * @method static Subscribe subscribe()
 * @method static Text text()
 * @method static Trace trace()
 * @method static Unarchive unarchive()
 * @method static Unblock unblock()
 * @method static Unfollow unfollow()
 * @method static Unmute unmute()
 * @method static Unpin unpin()
 * @method static Unread unread()
 * @method static V2 v2()
 * @method static Version version()
 * @method static Video video()
 * @method static Views views()
 * @method static Voice voice()
 * @method static ArgentinePhoneNumbers argentinePhoneNumbers()
 * @method static BrazilianPhoneNumbers brazilianPhoneNumbers()
 * @method static Chatwoot chatwoot()
 * @method static JoinRequests joinRequests()
 * @method static Keys keys()
 * @method static Mcp mcp()
 * @method static MemberAddMode memberAddMode()
 * @method static MemberShareHistoryMode memberShareHistoryMode()
 * @method static MembershipApproval membershipApproval()
 * @method static MexicanPhoneNumbers mexicanPhoneNumbers()
 * @method static Passkey passkey()
 * @method static PhoneNumbers phoneNumbers()
 * @method static SendSticker sendSticker()
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
