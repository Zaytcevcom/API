<?php

use api\controllers\DataController;

$controller = new DataController($request, $response, $args);

// Params
$search     = $controller->getToStringOrNull('search');
$count      = $controller->getToIntOrNull('count');
$offset     = $controller->getToIntOrNull('offset');

// Get emoji
$data = $controller->getEmoji($search, $count, $offset);

return $controller->success($data);