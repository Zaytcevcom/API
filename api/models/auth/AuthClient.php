<?php

declare(strict_types=1);

namespace api\models\auth;

use api\models\MainModel;

/**
 * @property int $client_id
 * @property string $client_name
 * @property int $client_type
 * @property string $client_secret
 * @property string $redirect_uri
 * @property string $display
 * @property int $scope
 * @property string $v
 * @property int $date_last_query
 */
class AuthClient extends MainModel
{
    protected $table = 'auth_clients';
    protected $primaryKey = 'client_id';

    protected $fillable = ['client_name', 'client_type', 'client_secret', 'redirect_uri', 'display', 'scope', 'v', 'date_last_query'];
}