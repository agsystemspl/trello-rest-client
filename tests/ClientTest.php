<?php

use PHPUnit\Framework\TestCase;
use AGSystems\Trello\REST\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Middleware;

class ClientTest extends TestCase
{
    public function __construct(string $name = null, array $data = [], string $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
    }

    public function testMembersMeBoardsGet()
    {
        $container = [];
        $history = Middleware::history($container);

        $mock = new MockHandler([
            new Response(200, [], '[{"name":"My Board"}]')
        ]);

        $handler = HandlerStack::create($mock);

        $handler->push($history);

        $client = new Client([
            'api_token' => getenv('API_TOKEN'),
            'app_id' => getenv('APP_ID'),
        ]);

        $client->customOptions([
            'handler' => $handler,
        ]);

        $result = $client->members->me->boards->get();
        $this->assertEquals('[{"name":"My Board"}]', $result);

        var_dump($container);
    }
}
