<?php

use api\controllers\DataController;

$controller = new DataController($request, $response, $args);

// Params
$ids = $controller->getToArrayInt('country_ids');

// Get countries by id
$data = $controller->getCountriesById($ids);

return $controller->success($data);