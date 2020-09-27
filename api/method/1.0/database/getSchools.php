<?php

use api\controllers\DataController;

$controller = new DataController($request, $response, $args);

// Params
$search     = $controller->getToStringOrNull('search');
$id_city    = $controller->getToIntOrNull('id_city');
$count      = $controller->getToIntOrNull('count');
$offset     = $controller->getToIntOrNull('offset');

// Get schools
$data = $controller->getSchools($search, $id_country, $count, $offset);

return $controller->success($data);