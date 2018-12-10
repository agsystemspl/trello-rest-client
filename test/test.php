<?php

require __DIR__ . "/../vendor/autoload.php";

$dotenv = new Dotenv\Dotenv(__DIR__ . '/../');
$dotenv->load();

$client = new \AGSystems\REST\Trello\Client(
    getenv('TRELLO_TOKEN'),
    getenv('TRELLO_APP_ID')
);

var_export($client->members->me->boards->get());
