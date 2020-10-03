<?php

use api\controllers\SignupController;

$controller = new SignupController($request, $response, $args);

// Check require params
$needFields = $controller->checkRequireFields([
    'unique_id', 'first_name', 'last_name', 'sex', 'country_id', 'city_id', 'birthday', 'password'
]);

if ($needFields) {
    return $controller->needFields($needFields);
}

// Params
$unique_id   = $controller->getToString('unique_id');
$first_name  = $controller->getToStringOrNull('first_name');
$last_name   = $controller->getToStringOrNull('last_name');
$sex         = $controller->getToInt('sex');
$country_id  = $controller->getToIntOrNull('country_id');
$city_id     = $controller->getToIntOrNull('city_id');
$birthday    = $controller->getToStringOrNull('birthday');
$password    = $controller->getToStringOrNull('password');

$params = [
    'first_name'    => $first_name,
    'last_name'     => $last_name,
    'sex'           => $sex,
    'country_id'    => $country_id,
    'city_id'       => $city_id,
    'birthday'      => $birthday,
    'password'      => $password
];

// Finish signup
$model = $controller->finish($unique_id, $params);

if ($model == SignupController::ERROR_SIGNUP_NOT_FOUND) {
    return $controller->error(2, 'Signup not found!');
}

if ($model == SignupController::ERROR_PHONE_NOT_CONFIRMED) {
    return $controller->error(3, 'Phone not confirmed!');
}

if ($model == SignupController::ERROR_PHOTO_NOT_LOADED) {
    return $controller->error(4, 'Photo not loaded!');
}

if ($model == SignupController::ERROR_CREATE_USER) {
    return $controller->error(5, 'Error create user!');
}

return $controller->success(['user_id' => $model->id]);