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
    $id = filter_var($args["id"], FILTER_SANITIZE_NUMBER_INT);

    /**
     * @var GuzzleHttp\Client $client
     */
    $client = $this->client;

    $articlesResponse = $client->request("GET", "/articles/" . $id);
    $json = (string)$articlesResponse->getBody();
    $article = json_decode($json, true);

    // Render index view
    return $this->renderer->render($response, 'index.phtml', ["articles" => [$article]]);
});