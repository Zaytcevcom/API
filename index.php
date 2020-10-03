<?php

use DI\Container;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

define('ROOT_DIR', __DIR__);

require ROOT_DIR . '/vendor/autoload.php';

require ROOT_DIR . '/config/defines.php';
$config = require ROOT_DIR . '/config/core.local.php';

// Configure the application via container
$app = AppFactory::createFromContainer(new Container());

require ROOT_DIR . '/config/dependencies.php';
require ROOT_DIR . '/config/handlers.php';
require ROOT_DIR . '/config/middleware.php';

$app->addRoutingMiddleware();

$errorMiddleware = $app->addErrorMiddleware(true, true, true);

require ROOT_DIR . '/routes/method.php';
require ROOT_DIR . '/routes/page.php';

$app->run();