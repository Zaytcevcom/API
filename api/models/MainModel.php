<?php

declare(strict_types=1);

namespace api\models;

use Psr\Container\ContainerInterface;
use Illuminate\Database\Eloquent\Model;

class MainModel extends Model
{
    public $timestamps = false;

    protected $container;

    /*public function __construct(ContainerInterface $c) {
        $this->container = $c;
    }*/
}