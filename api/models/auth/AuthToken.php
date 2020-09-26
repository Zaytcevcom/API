<?php

declare(strict_types=1);

namespace api\models\auth;

use api\models\MainModel;

/**
 * @property int $id
 * @property int $client_id
 * @property int $user_id
 * @property string $access_token
 * @property string $push_token
 * @property string $device_token
 * @property int $device_platform
 * @property int $is_dev
 * @property int $reg_time
 * @property int $expires_in
 * @property string $refresh_token
 * @property string $ip
 * @property string $ua
 */
class AuthRestore extends MainModel
{
    protected $table = 'auth_tokens';

    protected $fillable = [
        'client_id', 'user_id', 'access_token', 'push_token', 'device_token', 'device_platform',
        'is_dev', 'reg_time', 'expires_in', 'refresh_token', 'ip', 'ua'
    ];
}