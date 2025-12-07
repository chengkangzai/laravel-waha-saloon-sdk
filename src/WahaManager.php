<?php

namespace CCK\LaravelWahaSaloonSdk;

use CCK\LaravelWahaSaloonSdk\Waha\Waha;
use InvalidArgumentException;

class WahaManager
{
    /** @var array<string, Waha> */
    protected array $connections = [];

    protected ?string $defaultConnection = null;

    /**
     * @param  array<string, mixed>  $config
     */
    public function __construct(
        protected array $config = [],
    ) {
        $this->defaultConnection = $config['default'] ?? 'default';
    }

    /**
     * Get a WAHA connection instance.
     */
    public function connection(?string $name = null): Waha
    {
        $name = $name ?? $this->getDefaultConnection();

        if (! isset($this->connections[$name])) {
            $this->connections[$name] = $this->makeConnection($name);
        }

        return $this->connections[$name];
    }

    /**
     * Create a new connection instance.
     */
    protected function makeConnection(string $name): Waha
    {
        $config = $this->getConnectionConfig($name);

        return new Waha(
            baseUrl: $config['base_url'],
            apiKey: $config['api_key'],
        );
    }

    /**
     * Get the configuration for a connection.
     *
     * @return array{base_url: string, api_key: string|null}
     */
    protected function getConnectionConfig(string $name): array
    {
        $connections = $this->config['connections'] ?? [];

        if (! isset($connections[$name])) {
            throw new InvalidArgumentException(
                "WAHA connection [{$name}] not configured."
            );
        }

        /** @var array{base_url?: string, api_key?: string|null} $config */
        $config = $connections[$name];

        $baseUrl = $config['base_url'] ?? '';
        $apiKey = $config['api_key'] ?? null;

        // Fallback to legacy config for 'default' connection if values are empty
        if ($name === 'default') {
            if ($baseUrl === '') {
                $baseUrl = $this->config['base_url'] ?? '';
            }

            if ($apiKey === null || $apiKey === '') {
                $apiKey = $this->config['api_key'] ?? null;
            }
        }

        return [
            'base_url' => $baseUrl,
            'api_key' => $apiKey,
        ];
    }

    /**
     * Get the default connection name.
     */
    public function getDefaultConnection(): string
    {
        return $this->defaultConnection ?? 'default';
    }

    /**
     * Set the default connection name.
     */
    public function setDefaultConnection(string $name): void
    {
        $this->defaultConnection = $name;
    }

    /**
     * Purge a connection from the cache.
     */
    public function purge(?string $name = null): void
    {
        $name = $name ?? $this->getDefaultConnection();
        unset($this->connections[$name]);
    }

    /**
     * Purge all connections from the cache.
     */
    public function purgeAll(): void
    {
        $this->connections = [];
    }

    /**
     * Get all resolved connections.
     *
     * @return array<string, Waha>
     */
    public function getConnections(): array
    {
        return $this->connections;
    }

    /**
     * Dynamically pass method calls to the default connection.
     *
     * @param  array<int, mixed>  $parameters
     */
    public function __call(string $method, array $parameters): mixed
    {
        return $this->connection()->$method(...$parameters);
    }
}
