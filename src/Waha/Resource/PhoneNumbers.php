<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\PhoneNumbers\GetCacheStats;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\PhoneNumbers\ListInMemoryCacheEntries;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\PhoneNumbers\ListPersistentCacheEntries;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\PhoneNumbers\PurgeResolvedNumbersCache;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class PhoneNumbers extends Resource
{
    public function listInMemoryCacheEntries(
        string $session,
        int|float|null $limit = null,
        int|float|null $offset = null,
    ): Response {
        return $this->connector->send(new ListInMemoryCacheEntries($session, $limit, $offset));
    }

    public function listPersistentCacheEntries(
        string $session,
        int|float|null $limit = null,
        int|float|null $offset = null,
    ): Response {
        return $this->connector->send(new ListPersistentCacheEntries($session, $limit, $offset));
    }

    public function getCacheStats(
        string $session,
    ): Response {
        return $this->connector->send(new GetCacheStats($session));
    }

    public function purgeResolvedNumbersCache(
        string $session,
    ): Response {
        return $this->connector->send(new PurgeResolvedNumbersCache($session));
    }
}
