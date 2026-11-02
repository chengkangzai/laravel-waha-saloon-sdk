<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\MexicanPhoneNumbers\GetCacheStats;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\MexicanPhoneNumbers\ListInMemoryCacheEntries;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\MexicanPhoneNumbers\ListPersistentCacheEntries;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\MexicanPhoneNumbers\PurgeResolvedNumbersCache;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class MexicanPhoneNumbers extends Resource
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
