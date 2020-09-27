<?php

use api\controllers\DataController;

$controller = new DataController($request, $response, $args);

// Params
$search     = $controller->getToStringOrNull('search');
$id_faculty = $controller->getToIntOrNull('id_faculty');
$count      = $controller->getToIntOrNull('count');
$offset     = $controller->getToIntOrNull('offset');

// Get chairs
$data = $controller->getCities($search, $id_faculty, $count, $offset);

return $controller->success($data);