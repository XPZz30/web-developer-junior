<?php

use Illuminate\Database\Capsule\Manager as Capsule;

class Eloquent
{
    public function __construct()
    {
        $capsule = new Capsule;

        $capsule->addConnection([
            'driver'    => 'mysql',
            'host'      => '127.0.0.1',
            'database'  => 'desafio',
            'username'  => 'root',
            'password'  => '',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ]);

        // Set as global and boot Eloquent
        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }
}
