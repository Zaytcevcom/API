<?php

declare(strict_types=1);

namespace api\models\wallet;

use api\models\MainModel;

/**
 * @property int $id
 * @property int $owner_id
 * @property int $type
 * @property int $year
 * @property int $serial
 * @property int $number
 * @property int $code
 * @property double $balance
 * @property int $status
 * @property int $time_create
 * @property int $time_active
 * @property int $verified
 * @property string $first_name
 * @property string $last_name
 * @property string $patronymic
 * @property string $birthday
 * @property string $photo_passport_main
 * @property string $photo_passport_main_file
 * @property string $photo_passport_registration
 * @property string $photo_passport_registration_file
 */
class Wallet extends MainModel
{
    protected $table = 'wallet';

    protected $fillable = [
        'owner_id', 'type', 'year', 'serial', 'number', 'code', 'balance', 'status',
        'time_create', 'time_active', 'verified', 'first_name', 'last_name', 'patronymic', 'birthday',
        'photo_passport_main', 'photo_passport_main_file',
        'photo_passport_registration', 'photo_passport_registration_file'
    ];
}