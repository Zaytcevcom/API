<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use api\controllers\MainController;

$app->map(['GET', 'POST'], '/method/{controller}.{action}', function (Request $request, Response $response, $args) use ($config) {
    
    $version = (isset($args['v'])) ? $args['v'] : $config['version'];

    $filename = ROOT_DIR . DIRECTORY_SEPARATOR . 'api' . DIRECTORY_SEPARATOR . 'method' . DIRECTORY_SEPARATOR . $version . DIRECTORY_SEPARATOR . $args['controller'] . DIRECTORY_SEPARATOR . $args['action'] . '.php';

    // Method not allowed
    if (!file_exists($filename)) {
        $controller = new MainController($request, $response, $args);
        return $controller->methodNotAllowed();
    }

    return require $filename;
});