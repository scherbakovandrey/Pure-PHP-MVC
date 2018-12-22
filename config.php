<?php
define('PUBLIC_FOLDER', 'taskbook');

return [
    'publicFolder' => PUBLIC_FOLDER,
    'siteUrl' => 'http://' . $_SERVER['HTTP_HOST'] . '/' . PUBLIC_FOLDER . '/',
    'activeRecord' => __DIR__ . '/src/models/activerecord',
    'templatePath' => __DIR__ . '/resources/views/',
];