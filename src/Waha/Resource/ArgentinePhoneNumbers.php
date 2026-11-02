<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\ArgentinePhoneNumbers\GetCacheStats;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\ArgentinePhoneNumbers\ListInMemoryCacheEntries;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\ArgentinePhoneNumbers\ListPersistentCacheEntries;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\ArgentinePhoneNumbers\PurgeResolvedNumbersCache;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class ArgentinePhoneNumbers extends Resource
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
