<?php

declare(strict_types=1);

namespace api\models\data;

use api\models\MainModel;

/**
 * @property int $id
 * @property string|null $name
 * @property string|null $unified
 * @property string|null $non_qualified
 * @property string|null $docomo
 * @property string|null $au
 * @property string|null $softbank
 * @property string|null $google
 * @property string|null $image
 * @property int $sheet_x
 * @property int $sheet_y
 * @property string|null $short_name
 * @property string|null $short_names
 * @property string|null $text
 * @property string|null $texts
 * @property string|null $category
 * @property int $sort_order
 * @property string|null $added_in
 * @property int $has_img_apple
 * @property int $has_img_google
 * @property int $has_img_twitter
 * @property int $has_img_facebook
 * @property int $has_img_lo
 */
class DataEmoji extends MainModel
{
    protected $table = 'data_emoji';

    protected $fillable = [
        'name',
        'unified',
        'non_qualified',
        'docomo',
        'au',
        'softbank',
        'google',
        'image',
        'sheet_x',
        'sheet_y',
        'short_name',
        'short_names',
        'text',
        'texts',
        'category',
        'sort_order',
        'added_in',
        'has_img_apple',
        'has_img_google',
        'has_img_twitter',
        'has_img_facebook',
        'has_img_lo'
    ];

    // Get the available fields
    public static function getAvailableFields()
    {
        return [
            'id',
            'name',
            'unified',
            'non_qualified',
            'docomo',
            'au',
            'softbank',
            'google',
            'image',
            'sheet_x',
            'sheet_y',
            'short_name',
            'short_names',
            'text',
            'texts',
            'category',
            'sort_order',
            'added_in',
            'has_img_apple',
            'has_img_google',
            'has_img_twitter',
            'has_img_facebook',
            'has_img_lo'
        ];
    }
}