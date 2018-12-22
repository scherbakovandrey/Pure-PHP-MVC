<?php
session_start();

$config = require_once __DIR__ . '/config.php';

$routes = require_once __DIR__ . '/routes.php';

define('PATH_TO_ACTIVERECORD', __DIR__ . '/src/models/activerecord');

\ActiveRecord\Config::initialize(function ($cfg) {
    $cfg->set_model_directory(PATH_TO_ACTIVERECORD);
    $cfg->set_connections(
        array(
            'development' => 'mysql://root:@localhost/dev',
            'test' => 'mysql://root:@localhost/test',
            'production' => 'mysql://root:@localhost/taskbook'
        )
    );
    $cfg->set_default_connection('production');
    \ActiveRecord\Connection::$datetime_format = 'Y-m-d H:i:s';
});