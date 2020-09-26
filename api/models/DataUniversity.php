<?php

declare(strict_types=1);

namespace api\models;

use api\models\MainModel;

/**
 * @property int $id
 * @property int $id_city
 * @property string $name
 */
class DataUniversity extends MainModel
{   
    protected $table = 'data_university';

    protected $fillable = ['id_city', 'name'];
}