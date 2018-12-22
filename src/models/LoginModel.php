<?php

namespace TaskBook\Models;

use TaskBook\App;

class LoginModel extends AbstractModel
{
    public function login($credentials)
    {
        $this->attributes = $credentials;

        $validCredentials = $this->getValidCredentials();

        if ($credentials['username'] == $validCredentials['username'] && password_verify($credentials['password'], $validCredentials['passwordHash'])) {
            App::login($credentials['username']);
            return true;
        }

        return false;
    }

    public function logout()
    {
        App::logout();
    }

    private function getValidCredentials()
    {
        return [
            'username' => 'admin',
            'passwordHash' => password_hash('123', PASSWORD_DEFAULT)
        ];
    }
}