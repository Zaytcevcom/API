<?php

use api\controllers\DataController;

$controller = new DataController($request, $response, $args);

// Params
$ids = $controller->getToArrayInt('city_ids');

// Get cities by id
$data = $controller->getCitiesById($ids);

return $controller->success($data);