<?php
namespace CodeReport\Report\FileParser;

use CodeReport\FileHelpers;

class PHPLocTest extends \PHPUnit_Framework_TestCase
{
    use FileHelpers;

    protected $object;

    public function setup()
    {
        $this->object = new PHPLoc($this->fixtureFile('phploc.txt'));
    }

    public function testDataContainsDirs()
    {
        $data = $this->object->getData();
        $this->assertEquals(4, $data['directories']);
    }

    public function testDataContainsFiles()
    {
        $data = $this->object->getData();
        $this->assertEquals(14, $data['files']);
    }

    public function testDataContainsSize()
    {
        $data = $this->object->getData();

        $this->assertEquals(698, $data['size']['loc']);
        $this->assertEquals(316, $data['size']['cloc']);
        $this->assertEquals(382, $data['size']['ncloc']);
        $this->assertEquals(104, $data['size']['lloc']);

        $this->assertEquals(75, $data['size']['classes']);
        $this->assertEquals(5, $data['size']['class_length']['avg']);
        $this->assertEquals(1, $data['size']['class_length']['min']);
        $this->assertEquals(12, $data['size']['class_length']['max']);

        $this->assertEquals(1, $data['size']['method_length']['avg']);
        $this->assertEquals(1, $data['size']['method_length']['min']);
        $this->assertEquals(6, $data['size']['method_length']['max']);

        $this->assertEquals(1, $data['size']['functions']);
        $this->assertEquals(10, $data['size']['function_length']['avg']);

        $this->assertEquals(28, $data['size']['other']);
    }
}
