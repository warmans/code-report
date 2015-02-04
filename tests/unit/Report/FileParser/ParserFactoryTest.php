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
        $parser = $this->object->fromFile($this->fixtureFile('phploc.xml'));
        $this->assertTrue($parser instanceof PHPLoc, 'incorrect parser returned for phploc file ('.get_class($parser).')');
    }

    public function testCheckstyleFromFile()
    {
        $parser = $this->object->fromFile($this->fixtureFile('checkstyle.xml'));
        $this->assertTrue($parser instanceof Checkstyle, 'incorrect parser returned for checkstyle file ('.get_class($parser).')');
    }
}
