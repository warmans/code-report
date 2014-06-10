<?php
namespace CodeReport\Report\FileParser;

use CodeReport\FileHelpers;

class ParserFactoryTest extends \PHPUnit_Framework_TestCase
{
    use FileHelpers;

    /**
     * @var
     */
    private $object;

    public function setUp()
    {
        $this->object = new ParserFactory();
    }

    /**
     * @expectedException \RuntimeException
     */
    public function testUnknownFileContentsThrowsException()
    {
        $this->object->fromFile($this->fakeFile('foobar'));
    }

    /**
     * @expectedException \RuntimeException
     */
    public function testEmptyFileContentsThrowsException()
    {
        $this->object->fromFile($this->fakeFile(''));
    }

    public function testPhplocFromFile()
    {
        $parser = $this->object->fromFile($this->fixtureFile('phploc.txt'));
        $this->assertTrue($parser instanceof PHPLoc, 'incorrect parser returned for phploc file');
    }
}
