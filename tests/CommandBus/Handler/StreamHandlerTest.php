<?php declare(strict_types=1);

namespace ApiClients\Tests\Client\Skeleton\CommandBus\Handler;

use ApiClients\Client\Skeleton\CommandBus\Command\StreamCommand;
use ApiClients\Client\Skeleton\CommandBus\Handler\StreamHandler;
use ApiClients\Client\Skeleton\Resource\ExampleInterface;
use ApiClients\Tools\Services\Client\FetchAndIterateService;
use ApiClients\Tools\TestUtilities\TestCase;

final class StreamHandlerTest extends TestCase
{
    public function testBroadcasts()
    {
        $command = new StreamCommand('input');
        $service = $this->prophesize(FetchAndIterateService::class);
        $service->iterate('stream/input', 'stream', ExampleInterface::HYDRATE_CLASS)->shouldBeCalled();
        $handler = new StreamHandler($service->reveal());
        $handler->handle($command);
    }
}
