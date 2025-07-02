<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Channels\DeleteTheChannel;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Channels\FollowTheChannel;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Channels\GetTheChannelInfo;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Channels\MuteTheChannel;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Channels\PreviewChannelMessages;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Channels\UnfollowTheChannel;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Channels\UnmuteTheChannel;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class Channels extends Resource
{
    public function deleteTheChannel(string $session, string $id): Response
    {
        return $this->connector->send(new DeleteTheChannel($session, $id));
    }

    public function getTheChannelInfo(string $session, string $id): Response
    {
        return $this->connector->send(new GetTheChannelInfo($session, $id));
    }

    /**
     * @param  string  $downloadMedia  (Required)
     * @param  string  $limit  (Required)
     */
    public function previewChannelMessages(string $session, string $id, ?string $downloadMedia, ?string $limit): Response
    {
        return $this->connector->send(new PreviewChannelMessages($session, $id, $downloadMedia, $limit));
    }

    public function followTheChannel(string $session, string $id): Response
    {
        return $this->connector->send(new FollowTheChannel($session, $id));
    }

    public function unfollowTheChannel(string $session, string $id): Response
    {
        return $this->connector->send(new UnfollowTheChannel($session, $id));
    }

    public function muteTheChannel(string $session, string $id): Response
    {
        return $this->connector->send(new MuteTheChannel($session, $id));
    }

    public function unmuteTheChannel(string $session, string $id): Response
    {
        return $this->connector->send(new UnmuteTheChannel($session, $id));
    }
}
