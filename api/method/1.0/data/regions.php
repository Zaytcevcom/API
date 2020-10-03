<?php

use api\controllers\DataController;

$controller = new DataController($request, $response, $args);

// Params
$ids        = $controller->getToArrayInt('ids');
$search     = $controller->getToStringOrNull('search');
$id_country = $controller->getToIntOrNull('id_country');
$count      = $controller->getToIntOrNull('count');
$offset     = $controller->getToIntOrNull('offset');

// Get regions
$data = $controller->getRegions($ids, $search, $id_country, $count, $offset);

return $controller->success($data);