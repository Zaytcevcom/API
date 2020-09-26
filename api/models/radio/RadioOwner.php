<?php

declare(strict_types=1);

namespace api\models\radio;

use api\models\MainModel;

/**
 * @property int $id
 * @property int $owner_id
 * @property int $radio_id
 * @property int $time
 */
class Radio extends MainModel
{
    protected $table = 'radio_owners';

    protected $fillable = ['owner_id', 'radio_id', 'time'];
}