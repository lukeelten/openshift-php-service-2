<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes

$app->get('/', function (Request $request, Response $response) {
    /**
     * @var GuzzleHttp\Client $client
     */
    $client = $this->client;

    $articlesResponse = $client->request("GET", "/articles");
    $json = (string)$articlesResponse->getBody();
    $articles = json_decode($json, true);

    // Render index view
    return $this->renderer->render($response, 'index.phtml', ["articles" => $articles]);
});


$app->get('/{id}', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});