<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$app->map(['GET', 'POST'], '/method/{controller}.{action}', function (Request $request, Response $response, $args) use ($config) {
    
    $version = (isset($args['v'])) ? $args['v'] : $config['version'];

    $filename = ROOT_DIR . DIRECTORY_SEPARATOR . 'versions' . DIRECTORY_SEPARATOR . $version . DIRECTORY_SEPARATOR . $args['controller'] . DIRECTORY_SEPARATOR . $args['action'] . '.php';

    // Method not found
    if (!file_exists($filename)) {
        
        $response->getBody()->write(json_encode(['message' => 'Method not found']));

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(405);
    }

    // Answer
    $response->getBody()->write(json_encode([
        'response' => require $filename
    ]));

    return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(201);
});