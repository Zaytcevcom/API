<?php

use api\controllers\DataController;

$controller = new DataController($request, $response, $args);

// Params
$ids = $controller->getToArrayInt('ids');

// Get regions by id
$data = $controller->getRegionsById($ids);

return $controller->success($data);