<?php

require __DIR__ . "/../vendor/autoload.php";

$dotenv = new Dotenv\Dotenv(__DIR__ . '/../');
$dotenv->load();

$client = new \AGSystems\Trello\REST\Client(
    getenv('API_TOKEN'),
    getenv('APP_ID')
);

var_export($client->members->me->boards->get());

var_export($client->cards('xQ4gCVK8')->put([
    'name' => 'TEST ' . uniqid(),
    'desc' => 'Description ' . date('Y-m-d H:i:s'),
]));
