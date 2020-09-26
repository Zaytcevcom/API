<?php

// Флаг запуска скрипта
// Проверка входных данных
// функция положительного и отрицательного ответа

use api\models\data\DataCountry;

$model = DataCountry::find(1);
//$model->name = $model->name . '1';
//$model->save();

var_dump($model->name);

return ['h' => 'j'];

