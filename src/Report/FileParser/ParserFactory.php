<?php
namespace CodeReport\Report\FileParser;

use CodeReport\File;
use CodeReport\Filesystem;
use CodeReport\Report\FileParser\PHPLoc;

/**
 * Create a parser by matching a line an input file
 *
 * @package CodeReport\Report\FileParser
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
                return new PHPLoc($file);
            default:
                throw new \RuntimeException("No parser found for ".$file->getBasename());
        }
    }
}
