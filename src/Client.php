<?php

namespace AGSystems\REST\Trello;

class Client extends \AGSystems\REST\AbstractClient
{
    protected $accessToken;
    protected $appId;

    public function __construct($accessToken, $appId)
    {
        $this->accessToken = $accessToken;
        $this->appId = $appId;
    }

    protected function postHandler($data)
    {
        return [
            'form_params' => $data,
        ];
    }

    protected function putHandler($data)
    {
        return [
            'form_params' => $data,
        ];
    }

    protected function withOptions()
    {
        return [
            'base_uri' => 'https://api.trello.com/1/',
            'query' => [
                'key' => $this->appId,
                'token' => $this->accessToken,
            ]
        ];
    }
}
