<?php

declare(strict_types=1);

namespace api\models;

use api\models\MainModel;

/**
 * @property int $id
 * @property string $name
 * @property string|null $full_name
 * @property string|null $icon
 * @property int|null $phone
 * @property int|null $phone_length
 * @property double|null $latitude
 * @property double|null $longitude
 * @property string $iso3166
 * @property int|null $is_ignore
 */
class DataCountry extends MainModel
{
    protected $table = 'data_country';

    protected $fillable = ['name', 'full_name', 'icon', 'phone', 'phone_length', 'latitude', 'longitude', 'iso3166', 'is_ignore'];
}