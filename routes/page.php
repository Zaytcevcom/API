<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

// Index
$app->get('/', function (Request $request, Response $response, $args) use ($config) {
    $response->getBody()->write('api');
    return $response;
});

// OpenApi
$app->get('/openapi[/{format}]', function (Request $request, Response $response, $args) use ($config) {
    
    $openapi = \OpenApi\scan('api');

    // Yaml
    if ($args['format'] == 'yaml') {
        
        $response->getBody()
            ->write($openapi->toYaml());

        return $response
            ->withHeader('Content-Type', 'application/x-yaml')
            ->withStatus(200);
    }

    // JSON
    $response->getBody()
        ->write(json_encode($openapi, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));

    return $response
        ->withHeader('Content-Type', 'application/json; charset=utf-8')
        ->withStatus(200);
});

// Other
$app->get('/{page}', function (Request $request, Response $response, $args) use ($config) {
    $response->getBody()->write('/' . $args['page']);
    return $response;
});