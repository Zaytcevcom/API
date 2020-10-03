<?php

use api\controllers\DataController;

$controller = new DataController($request, $response, $args);

// Params
$ids        = $controller->getToArrayInt('ids');
$search     = $controller->getToStringOrNull('search');
$id_country = $controller->getToIntOrNull('id_university');
$count      = $controller->getToIntOrNull('count');
$offset     = $controller->getToIntOrNull('offset');

// Get faculties
$data = $controller->getFaculties($ids, $search, $id_university, $count, $offset);

return $controller->success($data);