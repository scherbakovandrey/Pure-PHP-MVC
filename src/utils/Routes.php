<?php

namespace TaskBook\Utils;

use Phroute;
use TaskBook\App;
use Phroute\Phroute\RouteCollector;

class Routes
{
    const CONTROLLER_NAMESPACE = 'TaskBook\\Controllers\\';

    /**
     * @return Phroute\Phroute\RouteDataArray
     */
    public static function getData()
    {
        $basePath = App::publicFolder();

        $router = new RouteCollector();

        $settings = self::getSettings();
        foreach ($settings as $key => $value) {
            $router->controller('/' . $basePath . $key, Routes::CONTROLLER_NAMESPACE . $value);
        }

        return $router->getData();
    }

    private static function getSettings()
    {
        return App::routes();
    }
}
