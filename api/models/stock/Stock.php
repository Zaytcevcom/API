<?php

declare(strict_types=1);

namespace api\models\stock;

use api\models\MainModel;

/**
 * @property int $id
 * @property int $user_id
 * @property int $union_id
 * @property string $logo
 * @property string $logo_file
 * @property string $name
 * @property string $description
 * @property int $time_start
 * @property int $time_end
 * @property int $is_published
 * @property int $age_limits
 * @property int $age_limits_time
 * @property int $time
 * @property int $hide
 */
class Stock extends MainModel
{
    protected $table = 'stocks';

    protected $fillable = [
        'user_id', 'union_id', 'logo', 'logo_file', 'name', 'description', 'time_start', 'time_end',
        'is_published', 'age_limits', 'age_limits_time', 'time', 'hide'
    ];
}