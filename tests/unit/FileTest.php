<?php
namespace CodeReport;

class FileTest extends \PHPUnit_Framework_TestCase
{
    use FileHelpers;

    public function testFindFirstLine()
    {
        $file = $this->fakeFile("foo\nbar\nbaz");
        $this->assertTrue($file->findLine('#^foo$#'));
    }

    public function testFindOtherLine()
    {
        $file = $this->fakeFile("foo\nbar\nbaz");
        $this->assertTrue($file->findLine('#^baz$#'));
    }
}
