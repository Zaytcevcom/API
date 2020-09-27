<?php

use api\controllers\DataController;

$controller = new DataController($request, $response, $args);

// Params
$ids = $controller->getToArrayInt('ids');

// Get universities by id
$data = $controller->getUniversitiesById($ids);

return $controller->success($data);