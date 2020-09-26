<?php

declare(strict_types=1);

namespace api\models\radio;

use api\models\MainModel;

/**
 * @property int $id
 * @property int $user_id
 * @property int $union_id
 * @property string $logo
 * @property string $logo_file
 * @property string $name
 * @property string $description
 * @property string $src
 * @property int $is_main
 * @property int $country_id
 * @property int $city_id
 * @property string $genre_ids
 * @property int $age_limits
 * @property int $age_limits_time
 * @property int $is_published
 * @property int $time
 * @property int $hide
 */
class Radio extends MainModel
{
    protected $table = 'radio';

    protected $fillable = [
        'user_id', 'union_id', 'logo', 'logo_file', 'name', 'description', 'src', 'is_main',
        'country_id', 'city_id', 'genre_ids', 'age_limits', 'age_limits_time', 'is_published', 'time', 'hide',
    ];
}