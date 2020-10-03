<?php

use api\controllers\SignupController;

$controller = new SignupController($request, $response, $args);

// Check require params
$needFields = $controller->checkRequireFields(['phone']);

if ($needFields) {
    return $controller->needFields($needFields);
}

// Params
$phone        = $controller->getToPhoneOrNull('phone');
$referrer_id  = $controller->getToIntOrNull('referrer_id');
$is_develop   = $controller->getToInt('is_develop');

// Start signup
$unique_id = $controller->start($phone, $referrer_id, $is_develop);

if ($unique_id == SignupController::ERROR_PHONE_INVALID) {
    return $controller->error(2, 'Invalid phone number');
}

if ($unique_id == SignupController::ERROR_PHONE_SAME) {
    return $controller->error(3, 'Same phone number');
}

return $controller->success(['unique_id' => $unique_id]);