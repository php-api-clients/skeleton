<?php declare(strict_types=1);

namespace ApiClients\Client\Skeleton;

use React\Promise\PromiseInterface;
use Rx\Observable;

interface AsyncClientInterface
{
    public function method(string $input): PromiseInterface;

    public function stream(string $input): Observable;
}
