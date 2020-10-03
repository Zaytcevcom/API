<?php

use api\controllers\UtilsController;

$controller = new UtilsController($request, $response, $args);

// Params
$number = $controller->getToStringOrNull('number');

// Get card info
//$data = $controller->getEmoji($ids, $search, $count, $offset);

return $controller->success($data);