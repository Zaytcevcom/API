<?php

declare(strict_types=1);

namespace api\models\system;

use api\models\MainModel;

/**
 * @property int $id
 * @property string $phone
 * @property string $code
 * @property int $time
 * @property int $count
 */
class Phone extends MainModel
{
    const CHECK_SUCCESS   = 1;
    const CHECK_NOT_FOUND = 2;
    const CHECK_INVALID   = 3;
    const CHECK_LIMIT     = 4;

    protected $table = '_phone';

    protected $fillable = [
        'phone',
        'code',
        'time',
        'count'
    ];

    /**
     * Send call
     * @param string $phone
     * @param int $is_develop
     * @return int
     */
    public static function call(string $phone, int $is_develop = 0) : int
    {
        $code = '1234';

        $modelCode = self::where('phone', $phone)->first();

        if (empty($modelCode)) {
            $modelCode = new Phone();
            $modelCode->phone = $phone;
        }
    
        $modelCode->code  = $code;
        $modelCode->time  = time();
        $modelCode->count = 0;

        $modelCode->save();

        return 1;
    }

    /**
     * Check code
     * @param string $phone
     * @param string $code
     * @return int
     */
    public static function checkCode(string $phone, string $code) : int
    {
        $modelCode = self::where('phone', $phone)->first();

        if (empty($modelCode)) {
            return self::CHECK_NOT_FOUND;
        }

        if ($modelCode->count > 3) {
            return self::CHECK_LIMIT;
        }

        if ($modelCode->code == $code) {
            $modelCode->delete();
            return self::CHECK_SUCCESS;
        }

        $modelCode->increment('count');
        
        return self::CHECK_INVALID;
    }
}