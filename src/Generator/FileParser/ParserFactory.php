<?php
namespace CodeReport\Generator\FileParser;

use CodeReport\File;
use CodeReport\Filesystem;
use CodeReport\Generator\FileParser\PHPLoc;

class ParserFactory
{
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
