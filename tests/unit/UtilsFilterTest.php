<?php

use TaskBook\Utils\Filter;

class UtilsFilterTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    public function testFilter()
    {
        $arr = [
            'username' => 'my user',
            'password' => 'my password',
            'extraparam' => 'some value'
        ];
        $filter = new Filter($arr);
        $filteredArr = $filter->process(['username', 'password']);
        $this->assertEquals($filteredArr, [
            'username' => 'my user',
            'password' => 'my password',
        ]);
    }
}