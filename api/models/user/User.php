<?php

declare(strict_types=1);

namespace api\models\user;

use api\models\MainModel;

/**
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property int $rate
 * @property int $rate_info
 * @property string $screen_name
 * @property int $last_visit
 * @property string $status
 * @property string $photo
 * @property string $photo_file
 * @property int $sex
 * @property string $email
 * @property string $phone
 * @property string $password
 * @property string $password_date
 * @property string $year
 * @property string $month
 * @property string $day
 * @property string $birthday
 * @property int $country_id
 * @property int $city_id
 * @property int $deleted
 * @property int $blocked
 * @property int $verified
 * @property int $is_bot
 */
class User extends MainModel
{
    protected $table = 'users';

    protected $fillable = [
        'first_name',
        'last_name',
        'rate',
        'rate_info',
        'screen_name',
        'last_visit',
        'status',
        'photo',
        'photo_file',
        'sex',
        'email',
        'phone',
        'password',
        'password_date',
        'year',
        'month',
        'day',
        'birthday',
        'country_id',
        'city_id',
        'deleted',
        'blocked',
        'verified',
        'is_bot',
    ];

    public static function getByPhone(string $phone, array $fields = ['id'])
    {
        return self::select($fields)->where('user_phone', $phone)->first();
    }

    public static function create(array $data)
    {
        $model = new User();

        $model->first_name  = isset($data['first_name']) ? $data['first_name'] : null;
        $model->last_name   = isset($data['last_name']) ? $data['first_name'] : null;
        $model->rate        = 0;
        $model->rate_info   = 0;
        $model->screen_name = null;
        $model->user_phone  = isset($data['phone']) ? $data['phone'] : null;

        if (!$model->save()) {
            return null;
        }

        return $model;
    }
}