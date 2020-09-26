<?php

declare(strict_types=1);

namespace api\models\stock;

use api\models\MainModel;

/**
 * @property int $id
 * @property int $owner_id
 * @property int $stock_id
 * @property int $time
 */
class StockOwner extends MainModel
{
    protected $table = 'stocks_owners';

    protected $fillable = ['owner_id', 'stock_id', 'time'];
}