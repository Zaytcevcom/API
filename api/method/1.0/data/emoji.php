<?php

use api\controllers\DataController;

$controller = new DataController($request, $response, $args);

// Params
$ids        = $controller->getToArrayInt('ids');
$search     = $controller->getToStringOrNull('search');
$count      = $controller->getToIntOrNull('count');
$offset     = $controller->getToIntOrNull('offset');

// Get emoji
$data = $controller->getEmoji($ids, $search, $count, $offset);

return $controller->success($data);