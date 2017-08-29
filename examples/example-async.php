<?php declare(strict_types=1);

use ApiClients\Client\Skeleton\AsyncClient;
use ApiClients\Client\Skeleton\Resource\ExampleInterface;
use React\EventLoop\Factory;
use function ApiClients\Foundation\resource_pretty_print;

require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'vendor/autoload.php';

$loop = Factory::create();
$client = AsyncClient::create($loop);

$client->method()->done(function (ExampleInterface $example) {
    resource_pretty_print($example);
});

$loop->run();
