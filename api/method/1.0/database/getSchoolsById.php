<?php

use api\controllers\DataController;

$controller = new DataController($request, $response, $args);

// Params
$ids = $controller->getToArrayInt('ids');

// Get schools by id
$data = $controller->getSchoolsById($ids);

return $controller->success($data);