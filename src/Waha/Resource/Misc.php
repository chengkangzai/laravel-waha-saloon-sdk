<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Misc\CreateNewApp;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Misc\CreateNewChannel;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Misc\CreateNewGroup;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Misc\CreateNewLabel;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Misc\CreateSession;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Misc\GetAllGroups;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Misc\GetAllKnownLidsToPhoneNumberMapping;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Misc\GetAllLabels;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Misc\GetAllSubscribedPresenceInformation;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Misc\GetChats;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Misc\GetListOfKnowChannels;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Misc\ListAllAppsForSession;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Misc\ListAllSessions;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Misc\SetSessionPresence;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class Misc extends Resource
{
    /**
     * @param  null|string  $sortBy  Sort by field
     * @param  null|string  $sortOrder  Sort order - <b>desc</b>ending (Z => A, New first) or <b>asc</b>ending (A => Z, Old first)
     */
    public function getChats(
        string $session,
        ?string $sortBy = null,
        ?string $sortOrder = null,
        string|int|float|null $limit = null,
        string|int|float|null $offset = null,
        ?bool $merge = null,
    ): Response {
        return $this->connector->send(new GetChats($session, $sortBy, $sortOrder, $limit, $offset, $merge));
    }

    public function getListOfKnowChannels(string $session, ?string $role = null): Response
    {
        return $this->connector->send(new GetListOfKnowChannels($session, $role));
    }

    public function createNewChannel(string $session, mixed $name = null, mixed $description = null, mixed $picture = null): Response
    {
        return $this->connector->send(new CreateNewChannel($session, $name, $description, $picture));
    }

    public function getAllLabels(string $session): Response
    {
        return $this->connector->send(new GetAllLabels($session));
    }

    public function createNewLabel(string $session, mixed $name = null, mixed $colorHex = null, mixed $color = null): Response
    {
        return $this->connector->send(new CreateNewLabel($session, $name, $colorHex, $color));
    }

    public function getAllKnownLidsToPhoneNumberMapping(string $session, string|int|float|null $limit = null, string|int|float|null $offset = null): Response
    {
        return $this->connector->send(new GetAllKnownLidsToPhoneNumberMapping($session, $limit, $offset));
    }

    public function createNewGroup(string $session, mixed $name = null, mixed $participants = null): Response
    {
        return $this->connector->send(new CreateNewGroup($session, $name, $participants));
    }

    /**
     * @param  null|string  $sortBy  Sort by field
     * @param  null|string  $sortOrder  Sort order - <b>desc</b>ending (Z => A, New first) or <b>asc</b>ending (A => Z, Old first)
     * @param  string|array|null  $exclude  Exclude fields
     */
    public function getAllGroups(
        string $session,
        ?string $sortBy = null,
        ?string $sortOrder = null,
        string|int|float|null $limit = null,
        string|int|float|null $offset = null,
        string|array|null $exclude = null,
    ): Response {
        return $this->connector->send(new GetAllGroups($session, $sortBy, $sortOrder, $limit, $offset, $exclude));
    }

    public function setSessionPresence(string $session, mixed $chatId = null, mixed $presence = null): Response
    {
        return $this->connector->send(new SetSessionPresence($session, $chatId, $presence));
    }

    public function getAllSubscribedPresenceInformation(string $session): Response
    {
        return $this->connector->send(new GetAllSubscribedPresenceInformation($session));
    }

    /**
     * @param  string|array|null  $expand  Expand additional session details.
     * @param  string|bool|null  $all  Return all sessions, including those that are in the STOPPED state.
     */
    public function listAllSessions(string|array|null $expand = null, string|bool|null $all = null): Response
    {
        return $this->connector->send(new ListAllSessions($expand, $all));
    }

    public function createSession(mixed $name = null, ?array $apps = null, ?bool $start = null, ?array $sessionConfig = null): Response
    {
        return $this->connector->send(new CreateSession($name, $apps, $start, $sessionConfig));
    }

    /**
     * @param  null|string  $session  Session name to list apps for
     */
    public function listAllAppsForSession(?string $session = null): Response
    {
        return $this->connector->send(new ListAllAppsForSession($session));
    }

    public function createNewApp(mixed $id = null, mixed $session = null, mixed $app = null, mixed $config = null, mixed $enabled = null): Response
    {
        return $this->connector->send(new CreateNewApp($id, $session, $app, $config, $enabled));
    }
}
