<?php
namespace CodeReport\Report\FileParser;

use CodeReport\FileHelpers;

class PHPLocTest extends \PHPUnit_Framework_TestCase
{
    use FileHelpers;

    protected $object;

    public function setup()
    {
        $this->object = new PHPLoc($this->fixtureFile('phploc.xml'));
    }

    public function testSomething()
    {
        $this->markTestIncomplete();
    }
}
