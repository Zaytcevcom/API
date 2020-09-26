<?php

declare(strict_types=1);

namespace api\models\photo;

use api\models\MainModel;

/**
 * @property int $id
 * @property int $owner_id
 * @property int $user_id
 * @property int $type
 * @property string $file_id
 * @property string $photos
 * @property string $description
 * @property int $date
 * @property int $count_likes
 * @property int $count_comments
 * @property int $album_id
 * @property int $position
 * @property string $hash
 * @property int $is_hidden
 * @property int $hide
 */
class Photo extends MainModel
{
    protected $table = 'photos';

    protected $fillable = [
        'owner_id', 'user_id', 'type', 'file_id', 'photos', 'description', 'date', 'count_likes',
        'count_comments', 'album_id', 'position', 'hash', 'is_hidden', 'hide',
    ];
}