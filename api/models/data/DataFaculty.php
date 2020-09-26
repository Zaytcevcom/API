<?php

declare(strict_types=1);

namespace api\models\data;

use api\models\MainModel;

/**
 * @property int $id
 * @property int $id_university
 * @property string $name
 */
class DataFaculty extends MainModel
{
    protected $table = 'data_faculty';

    protected $fillable = ['id_university', 'name'];
}