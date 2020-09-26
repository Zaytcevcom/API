<?php

declare(strict_types=1);

namespace api\models\referral;

use api\models\MainModel;

/**
 * @property int $id
 * @property int $owner_id
 * @property int $user_id
 * @property int $time
 */
class Referral extends MainModel
{
    protected $table = 'referrals';

    protected $fillable = ['owner_id', 'user_id', 'time'];
}