<?php

use api\controllers\UtilsController;

$controller = new UtilsController($request, $response, $args);

// Params
$text           = $controller->getToStringOrNull('text');
$format         = $controller->getToStringOrNull('format');
$level          = $controller->getToStringOrNull('level');
$size           = $controller->getToInt('size');
$margin         = $controller->getToInt('margin');
$back_color     = $controller->getToStringOrNull('back_color');
$fore_color     = $controller->getToStringOrNull('fore_color');

// Greate QR code
//$data = $controller->getEmoji($ids, $search, $count, $offset);

return $controller->success($data);