<?php

use Psr\Container\ContainerInterface;

$container = $app->getContainer();

// Service factory for the ORM
$container->set('db', function () {

    $db = require ROOT_DIR . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'db.local.php';
    
    $capsule = new \Illuminate\Database\Capsule\Manager;
    $capsule->addConnection([
        'driver'    => 'mysql',
        'host'      => $db['host'],
        'port'      => $db['port'],
        'database'  => $db['database'],
        'username'  => $db['username'],
        'password'  => $db['password'],
        'charset'   => $db['utf8'],
        'collation' => $db['utf8_unicode_ci'],
        'prefix'    => $db['']
    ]);

    $capsule->setAsGlobal();
    $capsule->bootEloquent();

    return $capsule;
});

$container->get('db');