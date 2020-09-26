<?php

declare(strict_types=1);

namespace api\models\sticker;

use api\models\MainModel;

/**
 * @property int $id
 * @property int $pack_id
 * @property string $photo
 * @property string $photo_file
 * @property string $words
 * @property string $emoji
 * @property int $position
 * @property int $time
 * @property int $hide
 */
class Sticker extends MainModel
{
    protected $table = 'stickers';

    protected $fillable = ['pack_id', 'photo', 'photo_file', 'words', 'emoji', 'position', 'time', 'hide'];
}