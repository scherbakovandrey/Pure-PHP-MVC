<?php

use TaskBook\Utils\TextFormatter;

class TextFormatterTest extends \Codeception\Test\Unit
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

    public function testFormatSimpleText()
    {
        $this->assertTrue(TextFormatter::checkFormat('Sample Body'));

        $this->assertTrue(TextFormatter::checkFormat('Sample Body SampleBodySampleBodySampleBodySampleBodySampleBody'));
    }

    public function testFormatBadText()
    {
        $this->assertFalse(TextFormatter::checkFormat('Sample Body SampleBodySampleBodySampleBodySampleBodySampleBody1'));

        $this->assertFalse(TextFormatter::checkFormat('SampleBodySampleBodySampleBodySampleBodySampleBodySampleBodySampleBodySampleBodySampleBodySampleBodySampleBodySampleBodySampleBodySampleBodySampleBodySampleBodySampleBodySampleBody'));
    }
}