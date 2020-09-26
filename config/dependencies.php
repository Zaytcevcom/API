<?php

$container = $app->getContainer();

// Service factory for the ORM
$container->set('db', function () {

    $config_db = require ROOT_DIR . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'database.php';
    var_dump($config_db);
    $capsule = new \Illuminate\Database\Capsule\Manager;
    $capsule->addConnection($config_db);

    $capsule->setAsGlobal();
    $capsule->bootEloquent();

    return $capsule;
});

//$app->add('db');