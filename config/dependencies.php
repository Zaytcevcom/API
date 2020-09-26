<?php

use Psr\Container\ContainerInterface;

$container = $app->getContainer();

// Service factory for the ORM
$container->set('db', function () {

    $db = require ROOT_DIR . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'database.php';
    
    $capsule = new \Illuminate\Database\Capsule\Manager;
    $capsule->addConnection([
        'driver' => 'mysql',
        'host' => $db['host'],
        'port'  => $db['port'],
        'database' => $db['database'],
        'username' => $db['username'],
        'password' => $db['password'],
        'charset' => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix' => ''
    ]);

    $capsule->setAsGlobal();
    $capsule->bootEloquent();

    return $capsule;
});