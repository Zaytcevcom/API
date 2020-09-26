<?php

declare(strict_types=1);

namespace api\models\gift;

use api\models\MainModel;

/**
 * @property int $id
 * @property string $id_category
 * @property double $coast
 * @property string $photo
 * @property string $photo_file
 * @property int $hide
 */
class Gift extends MainModel
{
    protected $table = 'gift';

    protected $fillable = ['id_category', 'coast', 'photo', 'photo_file', 'hide'];
}