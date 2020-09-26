<?php

declare(strict_types=1);

namespace api\models;

use api\models\MainModel;

/**
 * @property int $id
 * @property int $id_country
 * @property string $name
 * @property string|null $area
 * @property string|null $region
 * @property double|null $latitude
 * @property double|null $longitude
 * @property int|null $important
 * @property string $location
 * @property int|null $timezone
 */
class DataCity extends MainModel
{
    protected $table = 'data_city';

    protected $fillable = ['id_country', 'name', 'area', 'region', 'latitude', 'longitude', 'important', 'location', 'timezone'];
}