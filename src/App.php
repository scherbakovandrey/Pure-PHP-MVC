<?php

namespace TaskBook;

use TaskBook\Utils\FlashMessages;
use TaskBook\Utils\Routes;
use TaskBook\Views\ErrorView;
use Phroute;

class App {
    public static function __callStatic($name, $arguments) {
        if (!in_array($name, ['config', 'routes', 'siteUrl', 'publicFolder'])) {
            throw new \Exception ('There is no such method');
        }

        switch ($name) {
            case 'config';
            case 'routes';
                global ${$name};
                return ${$name};
            case 'siteUrl';
                global $config;
                return $config['siteUrl'];
            case 'publicFolder';
                global $config;
                return $config['publicFolder'];
            default:
                break;
        }
    }

    public static function run() {
        $dispatcher = new Phroute\Phroute\Dispatcher(Routes::getData());

        try {
            $response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
        } catch (Phroute\Phroute\Exception\HttpRouteNotFoundException $exception) {
            $response = self::renderNotFound();
        } catch (Phroute\Phroute\Exception\HttpMethodNotAllowedException $exception) {
            $response = self::renderNotAllowed();
        } catch (\Exception $exception) {
            $response = $exception->getMessage();
        }

        FlashMessages::clear();

        echo $response;
    }

    public static function renderNotFound() {
        header("HTTP/1.0 404 Not Found");
        return (new ErrorView(404))->render();
    }

    public static function renderNotAllowed() {
        header("HTTP/1.0 405 Method Not Allowed");
        return (new ErrorView(405))->render();
    }

    public static function redirect($url) {
        header('Location: ' . self::siteUrl() . $url);
        exit();
    }

    public static function flash($type, $message) {
        FlashMessages::setup($type, $message);
    }

    public static function getFlash() {
        return FlashMessages::getMessage();
    }

    public static function getFlashType() {
        return FlashMessages::getType();
    }

    public static function hasFlash() {
        return FlashMessages::hasAny();
    }

    public static function login($username) {
        $_SESSION['logged'] = true;
        $_SESSION['loggedUsername'] = $username;
    }

    public static function logout() {
        $_SESSION['logged'] = false;
        unset($_SESSION['loggedUsername']);

        self::redirect('');
    }

    public static function isLogged() {
        return isset($_SESSION['logged']) ? $_SESSION['logged'] : false;
    }

    public static function checkIsLogged() {
        if (self::isLogged()) {
            self::redirect('');
        }
    }

    public static function guard() {
        if (!self::isLogged()) {
            self::redirect('');
        }
    }
}