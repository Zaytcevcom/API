<?php

declare(strict_types=1);

namespace api\models\gift;

use api\models\MainModel;

/**
 * @property int $id
 * @property string $name
 */
class GiftCategory extends MainModel
{
    protected $table = 'gift_category';

    protected $fillable = ['name'];
}