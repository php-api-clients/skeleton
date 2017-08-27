<?php declare(strict_types=1);

namespace ApiClients\Tests\Skeleton;

use ApiClients\Client\Skeleton\ApiSettings;
use ApiClients\Foundation\Hydrator\Options as HydratorOptions;
use ApiClients\Foundation\Options as FoundationOptions;
use ApiClients\Tools\TestUtilities\TestCase;

final class ApiSettingsTest extends TestCase
{
    public function testGetOptions()
    {
        $options = ApiSettings::getOptions([], 'Suffix');
        self::assertTrue(isset($options[FoundationOptions::HYDRATOR_OPTIONS][HydratorOptions::NAMESPACE_SUFFIX]));
        self::assertSame('Suffix', $options[FoundationOptions::HYDRATOR_OPTIONS][HydratorOptions::NAMESPACE_SUFFIX]);
    }
}
