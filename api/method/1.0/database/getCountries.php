<?php

use api\controllers\DataController;

$controller = new DataController($request, $response, $args);

// Params
$search     = $controller->getToStringOrNull('search');
$need_all   = $controller->getToInt('need_all');
$count      = $controller->getToIntOrNull('count');
$offset     = $controller->getToIntOrNull('offset');

// Get countries
$data = $controller->getCountries($search, $need_all, $count, $offset);

return $controller->success($data);