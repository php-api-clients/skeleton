<?php declare(strict_types=1);

namespace ApiClients\Client\Skeleton;

use ApiClients\Client\Skeleton\CommandBus\Command\MethodCommand;
use ApiClients\Client\Skeleton\CommandBus\Command\StreamCommand;
use ApiClients\Foundation\ClientInterface;
use ApiClients\Foundation\Factory;
use ApiClients\Foundation\Resource\ResourceInterface;
use React\EventLoop\LoopInterface;
use React\Promise\CancellablePromiseInterface;
use React\Promise\PromiseInterface;
use Rx\Observable;
use function ApiClients\Tools\Rx\unwrapObservableFromPromise;

final class AsyncClient implements AsyncClientInterface
{
    /**
     * @var ClientInterface
     */
    private $client;

    /**
     * @param ClientInterface $client
     */
    private function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * @param  LoopInterface $loop
     * @param  array         $options
     * @return AsyncClient
     */
    public static function create(
        LoopInterface $loop,
        array $options = []
    ): self {
        $options = ApiSettings::getOptions($options, 'Async');
        $client = Factory::create($loop, $options);

        return new self($client);
    }

    /**
     * @internal
     * @param  ClientInterface $client
     * @return AsyncClient
     */
    public static function createFromClient(ClientInterface $client): self
    {
        return new self($client);
    }

    public function hydrate(string $resource): CancellablePromiseInterface
    {
        return $this->client->hydrate($resource);
    }

    public function extract(ResourceInterface $resource): CancellablePromiseInterface
    {
        return $this->client->extract($resource);
    }

    public function method(string $input): PromiseInterface
    {
        return $this->client->handle(new MethodCommand($input));
    }

    public function stream(string $input): Observable
    {
        return unwrapObservableFromPromise($this->client->handle(
            new StreamCommand($input)
        ));
    }
}
