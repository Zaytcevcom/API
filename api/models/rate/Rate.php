<?php

declare(strict_types=1);

namespace api\models\rate;

use api\models\MainModel;

/**
 * @property int $id
 * @property int $user_id
 * @property int $type
 * @property string $item_id
 * @property string $time
 */
class Rate extends MainModel
{
    protected $table = 'rate';

    protected $fillable = ['user_id', 'type', 'item_id', 'time'];
}