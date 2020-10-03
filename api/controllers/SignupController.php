<?php

declare(strict_types=1);

namespace api\controllers;

use api\models\user\User;
use api\models\system\Signup;
use api\models\system\Phone;

/**
 * SignupController
 */
class SignupController extends MainController
{   
    const ERROR_PHONE_INVALID       = 1;
    const ERROR_PHONE_SAME          = 2;
    const ERROR_PHONE_NOT_CONFIRMED = 3;
    const ERROR_PHONE_CODE          = 4;
    const ERROR_PHONE_CODE_LIMIT    = 5;
    const ERROR_PHOTO_NOT_LOADED    = 6;
    const ERROR_SIGNUP_NOT_FOUND    = 7;
    const ERROR_CREATE_USER         = 8; 

    /**
     * Start signup
     * @param string $phone
     * @param int|null $referrer_id
     * @param int|null $is_develop
     * @return mixed
     */
    public function start(string $phone = null, int $referrer_id = null, int $is_develop = 0)
    {
        $phone = $this->phoneTrim($phone);

        if (!$this->phoneCheck($phone)) {
            return self::ERROR_PHONE_INVALID;
        }

        if (!empty(User::getByPhone($phone))) {
            return self::ERROR_PHONE_SAME;
        }

        $model = Signup::where('phone', $phone)->first();

        if (empty($model)) {
            $model = new Signup();
            $model->phone = $phone;
        }

        $model->unique_id   = $this->uniqid($phone);
        $model->is_develop  = $is_develop;
        $model->referrer_id = $referrer_id;
        $model->is_confirm  = 0;
        $model->photo       = null;
        $model->photo_file  = null;
        $model->time        = time();
        $model->save();

        Phone::call($phone, $is_develop);

        return $model->unique_id;
    }

    /**
     * Confirm phone number
     * @param string $unique_id
     * @param array $params
     * @return mixed
     */
    public function confirmPhone(string $unique_id, string $code)
    {
        $modelSignup = Signup::where('unique_id', $unique_id)->first();

        if (empty($modelSignup)) {
            return self::ERROR_SIGNUP_NOT_FOUND;
        }

        $checkCode = Phone::checkCode($modelSignup->phone, $code);

        if ($checkCode == Phone::CHECK_SUCCESS) {
            $modelSignup->is_confirm = 1;
            $modelSignup->save();
            return 1;
        }

        if ($checkCode == Phone::CHECK_LIMIT) {
            return self::ERROR_PHONE_CODE_LIMIT;
        }

        return self::ERROR_PHONE_CODE;
    }

    /**
     * Finish signup
     * @param string $unique_id
     * @param array $params
     * @return mixed
     */
    public function finish(string $unique_id, array $params) 
    {
        $modelSignup = Signup::where('unique_id', $unique_id)->first();

        if (empty($modelSignup)) {
            return self::ERROR_SIGNUP_NOT_FOUND;
        }

        if (!$modelSignup->is_confirm) {
            return self::ERROR_PHONE_NOT_CONFIRMED;
        }

        if (is_null($modelSignup->photo_file)) {
            //return self::ERROR_PHOTO_NOT_LOADED;
        }

        //if ($modelSignup->is_develop) {
            $modelSignup->delete();
            return User::where('id', 736)->first();
        //}

        $data = [
            'phone'         => $modelSignup->phone,
            'referrer_id'   => $modelSignup->referrer_id,
            'photo'         => $modelSignup->photo,
            'photo_file'    => $modelSignup->photo_file,
            'first_name'    => $params['first_name'],
            'last_name'     => $params['last_name'],
            'sex'           => $params['sex'],
            'country_id'    => $params['country_id'],
            'city_id'       => $params['city_id'],
            'birthday'      => $params['birthday'],
            'password'      => $params['password'],
        ];

        $model = User::create($data);

        if (is_null($model)) {
            return self::ERROR_CREATE_USER;
        }

        $modelSignup->delete();

        return $model;
    }
}