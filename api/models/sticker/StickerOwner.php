<?php

declare(strict_types=1);

namespace api\models\sticker;

use api\models\MainModel;

/**
 * @property int $id
 * @property int $owner_id
 * @property int $pack_id
 * @property int $time
 */
class StickerOwner extends MainModel
{
    protected $table = 'stickers_owners';

    protected $fillable = ['owner_id', 'pack_id', 'time'];
}