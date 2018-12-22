<?php

namespace TaskBook\Utils;

class FlashMessages
{
    const SUCCESS = 1;

    const ERROR = 2;

    public static function setup($type, $message)
    {
        $_SESSION['flash'] = [
            'message' => $message,
            'type' => $type
        ];
    }

    public static function getMessage()
    {
        if (self::hasAny()) {
            return $_SESSION['flash']['message'];
        }
        return '';
    }

    public static function getType()
    {
        if (self::hasAny()) {
            switch ($_SESSION['flash']['type']) {
                case self::SUCCESS:
                    return 'success';
                case self::ERROR:
                    return 'danger';
                default:
                    return 'check';
            }
        }
        return '';
    }

    public static function hasAny()
    {
        return isset($_SESSION['flash']);
    }

    public static function clear()
    {
        unset($_SESSION['flash']);
    }
}
