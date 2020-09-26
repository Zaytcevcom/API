<?php

declare(strict_types=1);

namespace api\models\sticker;

use api\models\MainModel;

/**
 * @property int $id
 * @property int $id_category
 * @property int $user_id
 * @property int $union_id
 * @property string $name
 * @property string $description
 * @property string $icon
 * @property string $icon_file
 * @property string $cover
 * @property string $cover_file
 * @property string $banner
 * @property string $banner_file
 * @property int $coast
 * @property int $max_count
 * @property int $age_limits
 * @property int $age_limits_time
 * @property int $time
 * @property int $is_published
 * @property int $is_verified
 * @property int $status
 * @property string $comment
 * @property int $hide
 */
class StickerPack extends MainModel
{
    protected $table = 'stickers_pack';

    protected $fillable = [
        'id_category', 'user_id', 'union_id', 'name', 'description', 'icon', 'icon_file', 'cover', 'cover_file',
        'banner', 'banner_file', 'coast', 'max_count', 'age_limits', 'age_limits_time', 'time',
        'is_published', 'is_verified', 'status', 'comment', 'hide'
    ];
}