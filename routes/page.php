<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

// Index
$app->get('/', function (Request $request, Response $response, $args) use ($config) {
    $response->getBody()->write('api');
    return $response;
});

// Other
$app->get('/{page}', function (Request $request, Response $response, $args) use ($config) {
    $response->getBody()->write('/' . $args['page']);
    return $response;
});