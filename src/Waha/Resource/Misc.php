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
use Saloon\Contracts\Response;

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

    public function getAllLabels(string $session): Response
    {
        return $this->connector->send(new GetAllLabels($session));
    }

    public function createNewLabel(string $session, mixed $name, mixed $colorHex, mixed $color): Response
    {
        return $this->connector->send(new CreateNewLabel($session, $name, $colorHex, $color));
    }

    public function getAllKnownLidsToPhoneNumberMapping(string $session, ?string $limit, ?string $offset): Response
    {
        return $this->connector->send(new GetAllKnownLidsToPhoneNumberMapping($session, $limit, $offset));
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

    public function setSessionPresence(string $session, mixed $chatId, mixed $presence): Response
    {
        return $this->connector->send(new SetSessionPresence($session, $chatId, $presence));
    }

    public function getAllSubscribedPresenceInformation(string $session): Response
    {
        return $this->connector->send(new GetAllSubscribedPresenceInformation($session));
    }

    /**
     * @param  string  $expand  Expand additional session details.
     * @param  string  $expand  Expand additional session details.
     * @param  string  $all  Return all sessions, including those that are in the STOPPED state.
     */
    public function listAllSessions(?string $expand, ?string $all): Response
    {
        return $this->connector->send(new ListAllSessions($expand, $expand, $all));
    }

    public function createSession(mixed $name): Response
    {
        return $this->connector->send(new CreateSession($name));
    }

    /**
     * @param  string  $session  Session name to list apps for
     */
    public function listAllAppsForSession(?string $session): Response
    {
        return $this->connector->send(new ListAllAppsForSession($session));
    }

    public function createNewApp(mixed $id, mixed $session, mixed $app, mixed $config, mixed $enabled): Response
    {
        return $this->connector->send(new CreateNewApp($id, $session, $app, $config, $enabled));
    }
}
