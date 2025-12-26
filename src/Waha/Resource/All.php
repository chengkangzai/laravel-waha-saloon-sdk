<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\All\GetAllContacts;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class All extends Resource
{
    /**
     * @param  string  $sortBy  Sort by field
     * @param  string  $sortOrder  Sort order - <b>desc</b>ending (Z => A, New first) or <b>asc</b>ending (A => Z, Old first)
     */
    public function getAllContacts(
        ?string $session,
        ?string $sortBy,
        ?string $sortOrder,
        ?string $limit,
        ?string $offset,
    ): Response {
        return $this->connector->send(new GetAllContacts($session, $sortBy, $sortOrder, $limit, $offset));
    }
}
