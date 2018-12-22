<?php

class ListTasksCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function fronPageTest(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->see('TaskBook');
    }

    public function listPageTest(AcceptanceTester $I)
    {
        $I->amOnPage('/taskbook/list');
        $I->see('TaskBook');
        $I->see('Username');
    }

    public function failedLoginTest(AcceptanceTester $I)
    {
        $I->amOnPage('/taskbook/admin/login');
        $I->fillField('username', 'admin');
        $I->fillField('password', 'test');
        $I->click('Login');
        $I->see('Username or password is not valid!');
    }

    public function successLoginTest(AcceptanceTester $I)
    {
        $I->amOnPage('/taskbook/admin/login');
        $I->fillField('username', 'admin');
        $I->fillField('password', '123');
        $I->click('Login');
        $I->see('Taskbook Admin Panel');
    }

    public function addNewTaskFailedTest(AcceptanceTester $I)
    {
        $I->amOnPage('/taskbook/add');
        $I->fillField('username', 'tester');
        $I->fillField('email', 'test@email.com');
        $I->click('Submit Task');
        $I->see('Please check fields!');
    }

    public function addNewTaskSuccessTest(AcceptanceTester $I)
    {
        $I->amOnPage('/taskbook/add');
        $I->fillField('username', 'tester');
        $I->fillField('email', 'test@email.com');
        $I->fillField('text', 'Task Body');
        $I->click('Submit Task');
        $I->see('New task successfully added!');
    }
}
