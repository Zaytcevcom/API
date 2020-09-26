<?php

declare(strict_types=1);

namespace api\models\gift;

use api\models\MainModel;

/**
 * @property int $id
 * @property int $gift_id
 * @property int $from_id
 * @property int $to_id
 * @property string $comment
 * @property int $is_anonymous
 * @property int $time
 * @property int $hide
 */
class GiftOwner extends MainModel
{
    protected $table = 'gift_owner';

    protected $fillable = ['gift_id', 'from_id', 'to_id', 'comment', 'is_anonymous', 'time', 'hide'];
}