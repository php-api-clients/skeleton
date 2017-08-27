<?php declare(strict_types=1);

namespace ApiClients\Client\Skeleton\CommandBus\Handler;

use ApiClients\Client\Skeleton\CommandBus\Command\StreamCommand;
use ApiClients\Client\Skeleton\Resource\ExampleInterface;
use ApiClients\Tools\Services\Client\FetchAndHydrateService;
use ApiClients\Tools\Services\Client\FetchAndIterateService;
use React\Promise\PromiseInterface;
use function React\Promise\resolve;

final class StreamHandler
{
    /**
     * @var FetchAndHydrateService
     */
    private $service;

    /**
     * @param FetchAndIterateService $service
     */
    public function __construct(FetchAndIterateService $service)
    {
        $this->service = $service;
    }

    /**
     * Fetch the given repository and hydrate it.
     *
     * @param  StreamCommand    $command
     * @return PromiseInterface
     */
    public function handle(StreamCommand $command): PromiseInterface
    {
        return resolve($this->service->iterate(
            'stream/' . $command->getInput(),
            'stream',
            ExampleInterface::HYDRATE_CLASS
        ));
    }
}
