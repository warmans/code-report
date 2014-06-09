<?php
namespace CodeReport;

trait FileHelpers
{
    protected function fakeFile($contents)
    {
        $file = new File('php://memory', 'a+');
        $file->fwrite($contents);
        $file->rewind();
        return $file;
    }

    protected function fixtureFile($name)
    {
        return new File(dirname(__DIR__).'/fixture/'.$name);
    }
}
