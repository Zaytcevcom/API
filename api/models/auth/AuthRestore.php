<?php

declare(strict_types=1);

namespace api\models\auth;

use api\models\MainModel;

/**
 * @property int $id
 * @property string $unique_id
 * @property int $user_id
 * @property string $phone
 * @property string $phone_new
 * @property string $email
 * @property string $password
 * @property string $photo
 * @property string $photo_file
 * @property int $status
 * @property int $time
 */
class AuthRestore extends MainModel
{
    protected $table = 'auth_restore';

    protected $fillable = ['unique_id', 'user_id', 'phone', 'phone_new', 'email', 'password', 'photo', 'photo_file', 'status', 'time'];
}