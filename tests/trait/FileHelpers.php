<?php
namespace CodeReport;

/**
 * File-related functionality for testcases
 *
 * @package CodeReport
 */
trait FileHelpers
{
    /**
     * File that exists in memory only
     *
     * @param string $contents
     * @return File
     */
    protected function fakeFile($contents)
    {
        $file = new File('php://memory', 'a+');
        $file->fwrite($contents);
        $file->rewind();
        return $file;
    }

    /**
     * File from the test fixtures directory
     *
     * @param string $name
     * @return File
     */
    protected function fixtureFile($name)
    {
        return new File(dirname(__DIR__).'/fixture/'.$name);
    }
}
