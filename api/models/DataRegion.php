<?php

declare(strict_types=1);

namespace api\models;

use api\models\MainModel;

/**
 * @property int $id
 * @property int $id_country
 * @property string $name
 */
class DataRegion extends MainModel
{
    protected $table = 'data_region';

    protected $fillable = ['id_country', 'name'];
}