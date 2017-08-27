<?php declare(strict_types=1);

namespace ApiClients\Tests\Client\Skeleton\CommandBus\Handler;

use ApiClients\Client\Skeleton\CommandBus\Command\MethodCommand;
use ApiClients\Client\Skeleton\CommandBus\Handler\MethodHandler;
use ApiClients\Client\Skeleton\Resource\ExampleInterface;
use ApiClients\Tools\Services\Client\FetchAndHydrateService;
use ApiClients\Tools\TestUtilities\TestCase;

final class MethodHandlerTest extends TestCase
{
    public function testRepositoryKey()
    {
        $command = new MethodCommand('input');
        $service = $this->prophesize(FetchAndHydrateService::class);
        $service->fetch('example/input', 'example', ExampleInterface::HYDRATE_CLASS)->shouldBeCalled();
        $handler = new MethodHandler($service->reveal());
        $handler->handle($command);
    }
}
