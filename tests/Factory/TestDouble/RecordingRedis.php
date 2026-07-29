<?php

declare(strict_types=1);

namespace Snc\RedisBundle\Tests\Factory\TestDouble;

use Redis;

final class RecordingRedis extends Redis
{
    public static ?float $initialReadTimeout = null;

    public function pconnect(
        string $host,
        int $port = 6379,
        float $timeout = 0,
        ?string $persistentId = null,
        int $retryInterval = 0,
        float $readTimeout = 0,
        ?array $context = null,
    ): bool {
        self::$initialReadTimeout = $readTimeout;

        return true;
    }

    public function setOption(int $option, mixed $value): bool
    {
        return true;
    }
}
