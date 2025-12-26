<?php

namespace CCK\LaravelWahaSaloonSdk\Waha;

use CCK\LaravelWahaSaloonSdk\Waha\Resource\About;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Add;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\All;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Api;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Apps;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Archive;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Block;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\ByText;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\ByView;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Categories;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Channels;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Chats;
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
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Labels;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Leave;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Lids;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\LinkCustomPreview;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Locales;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Logout;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Me;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Messages;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\MessagesAdminOnly;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Misc;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Mute;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Name;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\NewMessageId;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Overview;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\Participants;
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
use CCK\LaravelWahaSaloonSdk\Waha\Resource\SendText;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\SendVideo;
use CCK\LaravelWahaSaloonSdk\Waha\Resource\SendVoice;
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
use Saloon\Http\Connector;

/**
 * WAHA - WhatsApp HTTP API
 */
class Waha extends Connector
{
    public function __construct(
        public string $baseUrl = '',
        protected ?string $apiKey = null,
    ) {
        // Only fall back to config when values are not provided AND we're in a Laravel context
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

    public function resolveBaseUrl(): string
    {
        return $this->baseUrl;
    }

    protected function defaultHeaders(): array
    {
        $headers = [];

        if ($this->apiKey) {
            $headers['X-Api-Key'] = $this->apiKey;
        }

        return $headers;
    }

    public function about(): About
    {
        return new About($this);
    }

    public function add(): Add
    {
        return new Add($this);
    }

    public function all(): All
    {
        return new All($this);
    }

    public function api(): Api
    {
        return new Api($this);
    }

    public function apps(): Apps
    {
        return new Apps($this);
    }

    public function archive(): Archive
    {
        return new Archive($this);
    }

    public function block(): Block
    {
        return new Block($this);
    }

    public function byText(): ByText
    {
        return new ByText($this);
    }

    public function byView(): ByView
    {
        return new ByView($this);
    }

    public function categories(): Categories
    {
        return new Categories($this);
    }

    public function channels(): Channels
    {
        return new Channels($this);
    }

    public function chats(): Chats
    {
        return new Chats($this);
    }

    public function checkExists(): CheckExists
    {
        return new CheckExists($this);
    }

    public function checkNumberStatus(): CheckNumberStatus
    {
        return new CheckNumberStatus($this);
    }

    public function contacts(): Contacts
    {
        return new Contacts($this);
    }

    public function count(): Count
    {
        return new Count($this);
    }

    public function countries(): Countries
    {
        return new Countries($this);
    }

    public function cpu(): Cpu
    {
        return new Cpu($this);
    }

    public function delete(): Delete
    {
        return new Delete($this);
    }

    public function demote(): Demote
    {
        return new Demote($this);
    }

    public function description(): Description
    {
        return new Description($this);
    }

    public function environment(): Environment
    {
        return new Environment($this);
    }

    public function events(): Events
    {
        return new Events($this);
    }

    public function follow(): Follow
    {
        return new Follow($this);
    }

    public function forwardMessage(): ForwardMessage
    {
        return new ForwardMessage($this);
    }

    public function groups(): Groups
    {
        return new Groups($this);
    }

    public function health(): Health
    {
        return new Health($this);
    }

    public function heapsnapshot(): Heapsnapshot
    {
        return new Heapsnapshot($this);
    }

    public function image(): Image
    {
        return new Image($this);
    }

    public function infoAdminOnly(): InfoAdminOnly
    {
        return new InfoAdminOnly($this);
    }

    public function inviteCode(): InviteCode
    {
        return new InviteCode($this);
    }

    public function join(): Join
    {
        return new Join($this);
    }

    public function joinInfo(): JoinInfo
    {
        return new JoinInfo($this);
    }

    public function labels(): Labels
    {
        return new Labels($this);
    }

    public function leave(): Leave
    {
        return new Leave($this);
    }

    public function lids(): Lids
    {
        return new Lids($this);
    }

    public function linkCustomPreview(): LinkCustomPreview
    {
        return new LinkCustomPreview($this);
    }

    public function locales(): Locales
    {
        return new Locales($this);
    }

    public function logout(): Logout
    {
        return new Logout($this);
    }

    public function me(): Me
    {
        return new Me($this);
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

    public function mute(): Mute
    {
        return new Mute($this);
    }

    public function name(): Name
    {
        return new Name($this);
    }

    public function newMessageId(): NewMessageId
    {
        return new NewMessageId($this);
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

    public function pin(): Pin
    {
        return new Pin($this);
    }

    public function ping(): Ping
    {
        return new Ping($this);
    }

    public function pn(): Pn
    {
        return new Pn($this);
    }

    public function presence(): Presence
    {
        return new Presence($this);
    }

    public function preview(): Preview
    {
        return new Preview($this);
    }

    public function profile(): Profile
    {
        return new Profile($this);
    }

    public function profilePicture(): ProfilePicture
    {
        return new ProfilePicture($this);
    }

    public function promote(): Promote
    {
        return new Promote($this);
    }

    public function qr(): Qr
    {
        return new Qr($this);
    }

    public function reaction(): Reaction
    {
        return new Reaction($this);
    }

    public function read(): Read
    {
        return new Read($this);
    }

    public function refresh(): Refresh
    {
        return new Refresh($this);
    }

    public function reject(): Reject
    {
        return new Reject($this);
    }

    public function remove(): Remove
    {
        return new Remove($this);
    }

    public function reply(): Reply
    {
        return new Reply($this);
    }

    public function requestCode(): RequestCode
    {
        return new RequestCode($this);
    }

    public function restart(): Restart
    {
        return new Restart($this);
    }

    public function revoke(): Revoke
    {
        return new Revoke($this);
    }

    public function screenshot(): Screenshot
    {
        return new Screenshot($this);
    }

    public function sendButtons(): SendButtons
    {
        return new SendButtons($this);
    }

    public function sendContactVcard(): SendContactVcard
    {
        return new SendContactVcard($this);
    }

    public function sendFile(): SendFile
    {
        return new SendFile($this);
    }

    public function sendImage(): SendImage
    {
        return new SendImage($this);
    }

    public function sendLinkPreview(): SendLinkPreview
    {
        return new SendLinkPreview($this);
    }

    public function sendList(): SendList
    {
        return new SendList($this);
    }

    public function sendLocation(): SendLocation
    {
        return new SendLocation($this);
    }

    public function sendPoll(): SendPoll
    {
        return new SendPoll($this);
    }

    public function sendPollVote(): SendPollVote
    {
        return new SendPollVote($this);
    }

    public function sendSeen(): SendSeen
    {
        return new SendSeen($this);
    }

    public function sendText(): SendText
    {
        return new SendText($this);
    }

    public function sendVideo(): SendVideo
    {
        return new SendVideo($this);
    }

    public function sendVoice(): SendVoice
    {
        return new SendVoice($this);
    }

    public function sessions(): Sessions
    {
        return new Sessions($this);
    }

    public function star(): Star
    {
        return new Star($this);
    }

    public function start(): Start
    {
        return new Start($this);
    }

    public function startTyping(): StartTyping
    {
        return new StartTyping($this);
    }

    public function status(): Status
    {
        return new Status($this);
    }

    public function stop(): Stop
    {
        return new Stop($this);
    }

    public function stopTyping(): StopTyping
    {
        return new StopTyping($this);
    }

    public function subject(): Subject
    {
        return new Subject($this);
    }

    public function subscribe(): Subscribe
    {
        return new Subscribe($this);
    }

    public function text(): Text
    {
        return new Text($this);
    }

    public function trace(): Trace
    {
        return new Trace($this);
    }

    public function unarchive(): Unarchive
    {
        return new Unarchive($this);
    }

    public function unblock(): Unblock
    {
        return new Unblock($this);
    }

    public function unfollow(): Unfollow
    {
        return new Unfollow($this);
    }

    public function unmute(): Unmute
    {
        return new Unmute($this);
    }

    public function unpin(): Unpin
    {
        return new Unpin($this);
    }

    public function unread(): Unread
    {
        return new Unread($this);
    }

    public function v2(): V2
    {
        return new V2($this);
    }

    public function version(): Version
    {
        return new Version($this);
    }

    public function video(): Video
    {
        return new Video($this);
    }

    public function views(): Views
    {
        return new Views($this);
    }

    public function voice(): Voice
    {
        return new Voice($this);
    }
}
