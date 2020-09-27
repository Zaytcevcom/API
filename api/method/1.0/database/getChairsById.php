<?php

use api\controllers\DataController;

$controller = new DataController($request, $response, $args);

// Params
$ids = $controller->getToArrayInt('ids');

// Get chairs by id
$data = $controller->getChairsById($ids);

return $controller->success($data);