<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\All\GetAllContacts;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class All extends Resource
{
    /**
     * @param  null|string  $sortBy  Sort by field
     * @param  null|string  $sortOrder  Sort order - <b>desc</b>ending (Z => A, New first) or <b>asc</b>ending (A => Z, Old first)
     */
    public function getAllContacts(
        ?string $session = null,
        ?string $sortBy = null,
        ?string $sortOrder = null,
        string|int|float|null $limit = null,
        string|int|float|null $offset = null,
    ): Response {
        return $this->connector->send(new GetAllContacts($session, $sortBy, $sortOrder, $limit, $offset));
    }
}
