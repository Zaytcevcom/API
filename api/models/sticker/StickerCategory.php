<?php

declare(strict_types=1);

namespace api\models\sticker;

use api\models\MainModel;

/**
 * @property int $id
 * @property string $name
 */
class StickerCategory extends MainModel
{
    protected $table = 'stickers_category';

    protected $fillable = ['name'];
}