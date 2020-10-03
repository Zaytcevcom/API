<?php

use api\controllers\DataController;

$controller = new DataController($request, $response, $args);

// Params
$ids        = $controller->getToArrayInt('ids');
$search     = $controller->getToStringOrNull('search');
$need_all   = $controller->getToInt('need_all');
$count      = $controller->getToIntOrNull('count');
$offset     = $controller->getToIntOrNull('offset');

// Get countries
$data = $controller->getCountries($ids, $search, $need_all, $count, $offset);

return $controller->success($data);