<?php

namespace AGSystems\Trello\REST;

class Client extends \AGSystems\REST\AbstractClient
{
    protected $accessToken;
    protected $appId;

    public function __construct(array $args)
    {
        $this->accessToken = $args['api_token'];
        $this->appId = $args['app_id'];
    }

    protected function clientOptions()
    {
        return [
            'debug' => true,
            'base_uri' => 'https://api.trello.com/1/',
            'query' => [
                'key' => $this->appId,
                'token' => $this->accessToken,
            ]
        ];
    }
}
