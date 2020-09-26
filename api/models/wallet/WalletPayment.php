<?php

declare(strict_types=1);

namespace api\models\wallet;

use api\models\MainModel;

/**
 * @property int $id
 * @property int $owner_id
 * @property double $live
 * @property double $sum
 * @property int $type
 * @property string $payment_id
 * @property int $status
 * @property int $time
 */
class WalletPayment extends MainModel
{
    protected $table = 'wallet_payment';

    protected $fillable = ['owner_id', 'live', 'sum', 'type', 'payment_id', 'status', 'time'];
}