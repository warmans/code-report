<?php
namespace CodeReport\Generator\FileParser;

use CodeReport\File;
use CodeReport\Filesystem;
use CodeReport\Generator\FileParser\PHPLoc;

/**
 * Create a parser by matching a line an input file
 *
 * @package CodeReport\Generator\FileParser
 */
class ParserFactory
{
    /**
     * @param File $file
     * @return ParserInterface
     * @throws \RuntimeException
     */
    public function fromFile(File $file)
    {
        switch (true) {
            case $file->findLine('#^phploc.+$#'):
                return new PHPLoc();
            default:
                throw new \RuntimeException("No parser found for ".$file->getBasename());
        }
    }
}
