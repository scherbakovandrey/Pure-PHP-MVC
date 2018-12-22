<?php

class Tasks extends ActiveRecord\Model
{
    static $table_name = 'tasks';

    static $validates_presence_of = [
        ['username', 'maximum' => 50],
        ['email', 'with' => '/^[^0-9][A-z0-9_]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_]+)*[.][A-z]{2,4}$/'],
        ['text', 'maximum' => 1000],
    ];
}