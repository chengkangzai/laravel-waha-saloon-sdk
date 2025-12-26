<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\ProfilePicture\GetContactProfilePictureUrl;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Contracts\Response;

class ProfilePicture extends Resource
{
    /**
     * @param  string  $refresh  Refresh the picture from the server (24h cache by default). Do not refresh if not needed, you can get rate limit error
     */
    public function getContactProfilePictureUrl(?string $contactId, ?string $refresh, ?string $session): Response
    {
        return $this->connector->send(new GetContactProfilePictureUrl($contactId, $refresh, $session));
    }
}
