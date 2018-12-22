<?php

namespace TaskBook\Utils;

class TextFormatter
{
    static $MAX_LENGTH = 50;

    public static function checkFormat($text)
    {
        $words = explode(' ', $text);
        foreach ($words as $word) {
            if (strlen($word) > self::$MAX_LENGTH) {
                return false;
            }
        }
        return true;
    }
}


