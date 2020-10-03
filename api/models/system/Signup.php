<?php

declare(strict_types=1);

namespace api\models\system;

use api\models\MainModel;

/**
 * @property int $id
 * @property string $unique_id
 * @property string $is_develop
 * @property string $phone
 * @property int|null $referrer_id
 * @property int $is_confirm
 * @property string|null $photo
 * @property string|null $photo_file
 * @property int $time
 */
class Signup extends MainModel
{
    protected $table = '_signup';

    protected $fillable = [
        'unique_id',
        'is_develop',
        'phone',
        'referrer_id',
        'is_confirm',
        'photo',
        'photo_file',
        'time',
    ];
}