<?php declare(strict_types=1);

namespace ApiClients\Tests\Skeleton;

use ApiClients\Foundation\Hydrator\Options as HydratorOptions;
use ApiClients\Foundation\Options as FoundationOptions;
use ApiClients\Foundation\Transport\Options as TransportOptions;
use ApiClients\Middleware\HttpExceptions\HttpExceptionsMiddleware;
use ApiClients\Middleware\UserAgent\Options as UserAgentMiddlewareOptions;
use ApiClients\Middleware\UserAgent\UserAgentMiddleware;
use ApiClients\Middleware\UserAgent\UserAgentStrategies;
use function ApiClients\Foundation\options_merge;
use ApiClients\Tools\TestUtilities\TestCase;
use ApiClients\Skeleton\ApiSettings;

final class ApiSettingsTest extends TestCase
{
    public function testGetOptions()
    {
        $options = ApiSettings::getOptions([], 'Suffix');
        self::assertTrue(isset($options[FoundationOptions::HYDRATOR_OPTIONS][HydratorOptions::NAMESPACE_SUFFIX]));
        self::assertSame('Suffix', $options[FoundationOptions::HYDRATOR_OPTIONS][HydratorOptions::NAMESPACE_SUFFIX]);
    }
}
