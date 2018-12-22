<?php

use PHPUnit\Framework\TestCase;
use AGSystems\Trello\REST\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;

class ClientTestOld extends TestCase
{
    public function testOne()
    {
        $this->assertTrue(false);
    }

    public function testMembersMeBoardsGet()
    {
        $mock = new MockHandler([
            new Response(200, [], '{"test": 3343}')
        ]);

        $handler = HandlerStack::create($mock);

        $client = new Client([
            'api_token' => getenv('API_TOKEN'),
            'app_id' => getenv('APP_ID'),
        ]);

        $client->customOptions([
            'handler' => $handler,
        ]);

        $result = $client->members->me->boards->get();

        $this->assertEquals('{"test": 3343}', $result);
    }
}
