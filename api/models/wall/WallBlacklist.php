<?php

declare(strict_types=1);

namespace api\models\wall;

use api\models\MainModel;

/**
 * @property int $id
 * @property string $user_id
 * @property int $owner_id
 * @property int $post_id
 */
class WallBlacklist extends MainModel
{
    protected $table = 'wall_blacklist';

    protected $fillable = ['user_id', 'owner_id', 'post_id'];
}