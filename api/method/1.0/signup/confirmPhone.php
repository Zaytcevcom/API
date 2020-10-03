<?php

use api\controllers\SignupController;

$controller = new SignupController($request, $response, $args);

// Check require params
$needFields = $controller->checkRequireFields(['unique_id', 'code']);

if ($needFields) {
    return $controller->needFields($needFields);
}

// Params
$unique_id = $controller->getToString('unique_id');
$code      = $controller->getToString('code');

// Confirm phone
$model = $controller->confirmPhone($unique_id, $code);

if ($model == SignupController::ERROR_SIGNUP_NOT_FOUND) {
    return $controller->error(2, 'Signup not found!');
}

if ($model == SignupController::ERROR_PHONE_CODE) {
    return $controller->error(3, 'Error phone code!');
}

if ($model == SignupController::ERROR_PHONE_CODE_LIMIT) {
    return $controller->error(4, 'Count limit of code attempt!');
}

return $controller->success(1);