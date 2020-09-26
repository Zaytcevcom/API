<?php

declare(strict_types=1);

namespace api\models\photo;

use api\models\MainModel;

/**
 * @property int $id
 * @property int $owner_id
 * @property string $title
 * @property string $description
 * @property int $cover_id
 * @property int $count_photo
 * @property int $date
 * @property int $privacy_view
 * @property int $privacy_comment
 * @property int $position
 * @property string $hash
 * @property int $hide
 */
class PhotoAlbum extends MainModel
{
    protected $table = 'photos_albums';

    protected $fillable = [
        'owner_id', 'title', 'description', 'cover_id', 'count_photo', 'date', 'privacy_view', 'privacy_comment',
        'position', 'hash', 'hide'
    ];
}