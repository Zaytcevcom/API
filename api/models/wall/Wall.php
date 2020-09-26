<?php

declare(strict_types=1);

namespace api\models\wall;

use api\models\MainModel;

/**
 * @property int $id
 * @property string $unique_id
 * @property int $unique_time
 * @property int $owner_id
 * @property int $user_id
 * @property int $signer_id
 * @property int $signed
 * @property string $message
 * @property string $hashtags
 * @property int $hashtags_time
 * @property int $attachment_id
 * @property string $repost
 * @property int $is_pinned
 * @property int $date
 * @property int $count_likes
 * @property int $count_reposts
 * @property int $count_comments
 * @property int $age_limits
 * @property int $age_limits_time
 * @property int $hide
 */
class Wall extends MainModel
{
    protected $table = 'wall';

    protected $fillable = [
        'unique_id', 'unique_time', 'owner_id', 'user_id', 'signer_id', 'signed', 'message', 'hashtags',
        'hashtags_time', 'attachment_id', 'repost', 'is_pinned', 'date', 'count_likes', 'count_reposts', 'count_comments',
        'age_limits', 'age_limits_time', 'hide'
    ];
}