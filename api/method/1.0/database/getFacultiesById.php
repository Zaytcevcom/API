<?php

use api\controllers\DataController;

$controller = new DataController($request, $response, $args);

// Params
$ids = $controller->getToArrayInt('ids');

// Get faculties by id
$data = $controller->getFacultiesById($ids);

return $controller->success($data);