<?php declare(strict_types=1);

namespace ApiClients\Client\Skeleton\CommandBus\Handler;

use ApiClients\Client\Skeleton\CommandBus\Command\MethodCommand;
use ApiClients\Client\Skeleton\Resource\ExampleInterface;
use ApiClients\Tools\Services\Client\FetchAndHydrateService;
use React\Promise\PromiseInterface;

final class MethodHandler
{
    /**
     * @var FetchAndHydrateService
     */
    private $service;

    /**
     * @param FetchAndHydrateService $service
     */
    public function __construct(FetchAndHydrateService $service)
    {
        $this->service = $service;
    }

    /**
     * Fetch the given repository and hydrate it.
     *
     * @param  MethodCommand    $command
     * @return PromiseInterface
     */
    public function handle(MethodCommand $command): PromiseInterface
    {
        return $this->service->fetch(
            'example/' . $command->getInput(),
            'example',
            ExampleInterface::HYDRATE_CLASS
        );
    }
}
