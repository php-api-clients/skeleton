<?php declare(strict_types=1);

namespace ApiClients\Client\Skeleton\CommandBus\Command;

use WyriHaximus\Tactician\CommandHandler\Annotations\Handler;

/**
 * @Handler("ApiClients\Client\Skeleton\CommandBus\Handler\MethodHandler")
 */
final class MethodCommand
{
    /**
     * @var string
     */
    private $input;

    /**
     * @param string $input
     */
    public function __construct(string $input)
    {
        $this->input = $input;
    }

    /**
     * @return string
     */
    public function getInput(): string
    {
        return $this->input;
    }
}
