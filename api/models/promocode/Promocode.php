<?php

declare(strict_types=1);

namespace api\models\promocode;

use api\models\MainModel;

/**
 * @property int $id
 * @property string $code
 * @property double $sum
 * @property int $time
 * @property int $created_by
 * @property int $activated_by
 * @property int $activated_time
 */
class Promocode extends MainModel
{
    protected $table = 'promocodes';

    protected $fillable = ['code', 'sum', 'time', 'created_by', 'activated_by', 'activated_time'];
}