<?php
/*
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
*/
/*
$server = '185.246.88.182';
$user = 'root';
$password = 'x1PKFIyFoxqxMrPrseBkqYMebwg9Wp3PNy68gjd8anDKtsDyvG';
$table = 'liveonce';
*/
/*
$server = '185.246.88.182';
$user = 'api';
$password = 'uVMZ1y5Qv9BFIjRs';
$table = 'liveonce';

$dblink = mysqli_connect($server, $user, $password, $table);

if($dblink)
echo 'Соединение установлено.';
else
die('Ошибка подключения к серверу баз данных.');
*/

use DI\Container;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

define('ROOT_DIR', __DIR__);

require ROOT_DIR . '/vendor/autoload.php';

require ROOT_DIR . '/config/defines.php';
$config = require ROOT_DIR . '/config/core.php';

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