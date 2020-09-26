<?php

declare(strict_types=1);

namespace api\models\wallet;

use api\models\MainModel;

/**
 * @property int $id
 * @property int $owner_id
 * @property string $name
 * @property string $number
 * @property string $cardholder
 * @property int $month
 * @property int $year
 * @property string $csc
 * @property int $time_create
 * @property int $hide
 */
class WalletCard extends MainModel
{
    protected $table = 'wallet_card';

    protected $fillable = ['owner_id', 'name', 'number', 'cardholder', 'month', 'year', 'csc', 'time_create', 'hide'];
}