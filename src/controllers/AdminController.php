<?php

namespace TaskBook\Controllers;

use TaskBook\App;
use TaskBook\Utils\FlashMessages;
use TaskBook\Models\LoginModel;
use TaskBook\Views\LoginView;
use TaskBook\Utils\Filter;

class AdminController
{
    public function anyIndex()
    {
        return $this->index();
    }

    public function getLogin()
    {
        return $this->index();
    }

    private function index()
    {
        App::checkIsLogged();

        $loginModel = new LoginModel();
        return (new LoginView($loginModel))->render();
    }

    public function postLogin()
    {
        App::checkIsLogged();

        $loginModel = new LoginModel();

        $credentials = (new Filter($_POST))->process(['username', 'password']);

        if ($loginModel->login($credentials)) {
            App::redirect('list');
        }

        App::flash(FlashMessages::ERROR, 'Username or password is not valid!');

        return (new LoginView($loginModel))->render();
    }

    public function anyLogout()
    {
        App::logout();
    }
}