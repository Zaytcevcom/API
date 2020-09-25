<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

define('ROOT_DIR', __DIR__);

require ROOT_DIR . '/vendor/autoload.php';
require ROOT_DIR . '/config/defines.php';
$config = require ROOT_DIR . '/config/core.php';

$app = AppFactory::create();
$app->addRoutingMiddleware();
$errorMiddleware = $app->addErrorMiddleware(true, true, true);

// Api methods
$app->get('/methods/{controller}.{action}', function (Request $request, Response $response, $args) use ($config) {
    
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

// Page
$app->get('/{page}', function (Request $request, Response $response, $args) use ($config) {
    $response->getBody()->write('/' . $args['page']);
    return $response;
});

$app->get('/', function (Request $request, Response $response, $args) use ($config) {
    $response->getBody()->write('/index');
    return $response;
});

$app->run();