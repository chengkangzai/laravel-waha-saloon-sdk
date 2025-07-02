<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Misc\ChattingControllerForwardMessage;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Misc\ChattingControllerSendContactVcard;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Misc\ChattingControllerSendLinkPreviewDeprecated;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Misc\ChattingControllerSendLocation;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Misc\ChattingControllerSendSeen;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Misc\ChattingControllerStartTyping;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Misc\ChattingControllerStopTyping;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Misc\CheckNumberStatus;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Misc\CheckTheHealthOfTheServer;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Misc\CreateNewChannel;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Misc\CreateNewGroup;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Misc\CreateNewLabel;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Misc\CreateSession;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Misc\DeprecatedYouCanSetReplyToFieldWhenSendingTextImageEtc;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Misc\GetAllGroups;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Misc\GetAllLabels;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Misc\GetAllSubscribedPresenceInformation;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Misc\GetChats;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Misc\GetInfoAboutTheGroupBeforeJoining;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Misc\GetLabelsForTheChat;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Misc\GetListOfKnowChannels;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Misc\GetMessagesInChat;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Misc\GetTheNumberOfGroups;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Misc\GetTheServerVersion;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Misc\JoinGroupViaCode;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Misc\ListAllSessions;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Misc\LogoutAndDeleteSession;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Misc\PingTheServer;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Misc\ReactToMessageWithEmoji;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Misc\RefreshGroupsFromTheServer;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Misc\SaveLabelsForTheChat;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Misc\ScreenshotControllerScreenshot;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Misc\SendButtonsInteractiveMessage;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Misc\SendEventMessage;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Misc\SendFile;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Misc\SendImage;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Misc\SendPollWithOptions;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Misc\SendVideo;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Misc\SendVoiceMessage;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Misc\SetSessionPresence;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Misc\StarOrUnstarMessage;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Misc\StopAndLogoutIfAskedSession;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Misc\UpsertAndStartSession;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class Misc extends Resource
{
    /**
     * @param  string  $sortBy  Sort by field
     * @param  string  $sortOrder  Sort order - <b>desc</b>ending (Z => A, New first) or <b>asc</b>ending (A => Z, Old first)
     */
    public function getChats(
        string $session,
        ?string $sortBy,
        ?string $sortOrder,
        ?string $limit,
        ?string $offset,
    ): Response {
        return $this->connector->send(new GetChats($session, $sortBy, $sortOrder, $limit, $offset));
    }

    public function getListOfKnowChannels(string $session, ?string $role): Response
    {
        return $this->connector->send(new GetListOfKnowChannels($session, $role));
    }

    public function createNewChannel(string $session, mixed $name, mixed $description, mixed $picture): Response
    {
        return $this->connector->send(new CreateNewChannel($session, $name, $description, $picture));
    }

    public function getLabelsForTheChat(string $session, string $chatId): Response
    {
        return $this->connector->send(new GetLabelsForTheChat($session, $chatId));
    }

    public function saveLabelsForTheChat(string $session, string $chatId, mixed $labels): Response
    {
        return $this->connector->send(new SaveLabelsForTheChat($session, $chatId, $labels));
    }

    public function getAllLabels(string $session): Response
    {
        return $this->connector->send(new GetAllLabels($session));
    }

    public function createNewLabel(string $session, mixed $name, mixed $colorHex, mixed $color): Response
    {
        return $this->connector->send(new CreateNewLabel($session, $name, $colorHex, $color));
    }

    public function createNewGroup(string $session, mixed $name, mixed $participants): Response
    {
        return $this->connector->send(new CreateNewGroup($session, $name, $participants));
    }

    /**
     * @param  string  $sortBy  Sort by field
     * @param  string  $sortOrder  Sort order - <b>desc</b>ending (Z => A, New first) or <b>asc</b>ending (A => Z, Old first)
     * @param  string  $exclude  Exclude fields
     * @param  string  $exclude  Exclude fields
     */
    public function getAllGroups(
        string $session,
        ?string $sortBy,
        ?string $sortOrder,
        ?string $limit,
        ?string $offset,
        ?string $exclude,
    ): Response {
        return $this->connector->send(new GetAllGroups($session, $sortBy, $sortOrder, $limit, $offset, $exclude, $exclude));
    }

    /**
     * @param  string  $code  (Required) Group code (123) or url (https://chat.whatsapp.com/123)
     */
    public function getInfoAboutTheGroupBeforeJoining(string $session, ?string $code): Response
    {
        return $this->connector->send(new GetInfoAboutTheGroupBeforeJoining($session, $code));
    }

    public function joinGroupViaCode(string $session, mixed $code): Response
    {
        return $this->connector->send(new JoinGroupViaCode($session, $code));
    }

    public function getTheNumberOfGroups(string $session): Response
    {
        return $this->connector->send(new GetTheNumberOfGroups($session));
    }

    public function refreshGroupsFromTheServer(string $session): Response
    {
        return $this->connector->send(new RefreshGroupsFromTheServer($session));
    }

    public function setSessionPresence(string $session, mixed $chatId, mixed $presence): Response
    {
        return $this->connector->send(new SetSessionPresence($session, $chatId, $presence));
    }

    public function getAllSubscribedPresenceInformation(string $session): Response
    {
        return $this->connector->send(new GetAllSubscribedPresenceInformation($session));
    }

    public function sendEventMessage(string $session, mixed $chatId, mixed $event, mixed $replyTo): Response
    {
        return $this->connector->send(new SendEventMessage($session, $chatId, $event, $replyTo));
    }

    /**
     * @param  string  $all  Return all sessions, including those that are in the STOPPED state.
     */
    public function listAllSessions(?string $all): Response
    {
        return $this->connector->send(new ListAllSessions($all));
    }

    public function createSession(mixed $name, mixed $start, mixed $config): Response
    {
        return $this->connector->send(new CreateSession($name, $start, $config));
    }

    public function upsertAndStartSession(mixed $name, mixed $config): Response
    {
        return $this->connector->send(new UpsertAndStartSession($name, $config));
    }

    public function stopAndLogoutIfAskedSession(mixed $name, mixed $logout): Response
    {
        return $this->connector->send(new StopAndLogoutIfAskedSession($name, $logout));
    }

    public function logoutAndDeleteSession(mixed $name): Response
    {
        return $this->connector->send(new LogoutAndDeleteSession($name));
    }

    public function sendImage(mixed $chatId, mixed $file, mixed $session, mixed $replyTo, mixed $caption): Response
    {
        return $this->connector->send(new SendImage($chatId, $file, $session, $replyTo, $caption));
    }

    public function sendFile(mixed $chatId, mixed $file, mixed $session, mixed $replyTo, mixed $caption): Response
    {
        return $this->connector->send(new SendFile($chatId, $file, $session, $replyTo, $caption));
    }

    public function sendVoiceMessage(mixed $chatId, mixed $file, mixed $session, mixed $replyTo): Response
    {
        return $this->connector->send(new SendVoiceMessage($chatId, $file, $session, $replyTo));
    }

    public function sendVideo(
        mixed $chatId,
        mixed $file,
        mixed $session,
        mixed $replyTo,
        mixed $asNote,
        mixed $caption,
    ): Response {
        return $this->connector->send(new SendVideo($chatId, $file, $session, $replyTo, $asNote, $caption));
    }

    public function sendButtonsInteractiveMessage(
        mixed $chatId,
        mixed $header,
        mixed $body,
        mixed $footer,
        mixed $buttons,
        mixed $session,
        mixed $headerImage,
    ): Response {
        return $this->connector->send(new SendButtonsInteractiveMessage($chatId, $header, $body, $footer, $buttons, $session, $headerImage));
    }

    public function chattingControllerForwardMessage(mixed $chatId, mixed $messageId, mixed $session): Response
    {
        return $this->connector->send(new ChattingControllerForwardMessage($chatId, $messageId, $session));
    }

    public function chattingControllerSendSeen(
        mixed $chatId,
        mixed $session,
        mixed $messageId,
        mixed $messageIds,
        mixed $participant,
    ): Response {
        return $this->connector->send(new ChattingControllerSendSeen($chatId, $session, $messageId, $messageIds, $participant));
    }

    public function chattingControllerStartTyping(mixed $chatId, mixed $session): Response
    {
        return $this->connector->send(new ChattingControllerStartTyping($chatId, $session));
    }

    public function chattingControllerStopTyping(mixed $chatId, mixed $session): Response
    {
        return $this->connector->send(new ChattingControllerStopTyping($chatId, $session));
    }

    public function reactToMessageWithEmoji(mixed $messageId, mixed $reaction, mixed $session): Response
    {
        return $this->connector->send(new ReactToMessageWithEmoji($messageId, $reaction, $session));
    }

    public function starOrUnstarMessage(mixed $messageId, mixed $chatId, mixed $star, mixed $session): Response
    {
        return $this->connector->send(new StarOrUnstarMessage($messageId, $chatId, $star, $session));
    }

    public function sendPollWithOptions(mixed $chatId, mixed $poll, mixed $session, mixed $replyTo): Response
    {
        return $this->connector->send(new SendPollWithOptions($chatId, $poll, $session, $replyTo));
    }

    public function chattingControllerSendLocation(
        mixed $chatId,
        mixed $latitude,
        mixed $longitude,
        mixed $title,
        mixed $session,
        mixed $replyTo,
    ): Response {
        return $this->connector->send(new ChattingControllerSendLocation($chatId, $latitude, $longitude, $title, $session, $replyTo));
    }

    public function chattingControllerSendContactVcard(
        mixed $chatId,
        mixed $contacts,
        mixed $session,
        mixed $replyTo,
    ): Response {
        return $this->connector->send(new ChattingControllerSendContactVcard($chatId, $contacts, $session, $replyTo));
    }

    /**
     * @param  string  $downloadMedia  Download media for messages
     * @param  string  $chatId  (Required)
     * @param  string  $session  (Required)
     * @param  string  $limit  (Required)
     * @param  string  $filterTimestampLte  Filter messages before this timestamp (inclusive)
     * @param  string  $filterTimestampGte  Filter messages after this timestamp (inclusive)
     * @param  string  $filterFromMe  From me filter (by default shows all messages)
     * @param  string  $filterAck  Filter messages by acknowledgment status
     */
    public function getMessagesInChat(
        ?string $downloadMedia,
        ?string $chatId,
        ?string $session,
        ?string $limit,
        ?string $offset,
        ?string $filterTimestampLte,
        ?string $filterTimestampGte,
        ?string $filterFromMe,
        ?string $filterAck,
    ): Response {
        return $this->connector->send(new GetMessagesInChat($downloadMedia, $chatId, $session, $limit, $offset, $filterTimestampLte, $filterTimestampGte, $filterFromMe, $filterAck));
    }

    /**
     * @param  string  $phone  (Required) The phone number to check
     * @param  string  $session  (Required)
     */
    public function checkNumberStatus(?string $phone, ?string $session): Response
    {
        return $this->connector->send(new CheckNumberStatus($phone, $session));
    }

    public function deprecatedYouCanSetReplyToFieldWhenSendingTextImageEtc(
        mixed $chatId,
        mixed $text,
        mixed $session,
        mixed $replyTo,
        mixed $linkPreview,
        mixed $linkPreviewHighQuality,
    ): Response {
        return $this->connector->send(new DeprecatedYouCanSetReplyToFieldWhenSendingTextImageEtc($chatId, $text, $session, $replyTo, $linkPreview, $linkPreviewHighQuality));
    }

    public function chattingControllerSendLinkPreviewDeprecated(
        mixed $chatId,
        mixed $session,
        mixed $url,
        mixed $title,
    ): Response {
        return $this->connector->send(new ChattingControllerSendLinkPreviewDeprecated($chatId, $session, $url, $title));
    }

    /**
     * @param  string  $session  (Required)
     */
    public function screenshotControllerScreenshot(?string $session): Response
    {
        return $this->connector->send(new ScreenshotControllerScreenshot($session));
    }

    public function getTheServerVersion(): Response
    {
        return $this->connector->send(new GetTheServerVersion);
    }

    public function pingTheServer(): Response
    {
        return $this->connector->send(new PingTheServer);
    }

    public function checkTheHealthOfTheServer(): Response
    {
        return $this->connector->send(new CheckTheHealthOfTheServer);
    }
}
