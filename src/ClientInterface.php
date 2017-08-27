<?php declare(strict_types=1);

namespace ApiClients\Client\Skeleton;

use ApiClients\Client\Skeleton\Resource\ExampleInterface;

interface ClientInterface
{
    public function method(string $input): ExampleInterface;

    public function stream(string $input): array;
}
