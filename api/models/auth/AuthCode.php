<?php

declare(strict_types=1);

namespace api\models\auth;

use api\models\MainModel;

/**
 * @property int $id
 * @property string $code
 * @property int $client_id
 * @property int $expiry_time
 * @property int $create_date
 * @property int $user_id
 */
class AuthCode extends MainModel
{
    protected $table = 'auth_codes';

    protected $fillable = ['code', 'client_id', 'expiry_time', 'create_date', 'user_id'];
}