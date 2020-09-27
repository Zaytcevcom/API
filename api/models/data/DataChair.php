<?php

declare(strict_types=1);

namespace api\models\data;

use api\models\MainModel;

/**
 * @property int $id
 * @property int $id_faculty
 * @property string $name
 */
class DataChair extends MainModel
{
    protected $table = 'data_chair';

    protected $fillable = [
        'id_faculty',
        'name'
    ];

    // Get the available fields
    public static function getAvailableFields()
    {
        return [
            'id',
            'id_faculty',
            'name'
        ];
    }
}