<?php
namespace CodeReport\Report\FileParser;

use CodeReport\Filesystem;
use CodeReport\Report\Data;

class Checkstyle extends AbstractParser
{
    /**
     * Get the human readable name for the format
     *
     * @return string
     */
    public function getRealName()
    {
        return 'Checkstyle';
    }

    /**
     * Get the simple name for the format used for template and output file names
     *
     * @return string
     */
    public function getFilename()
    {
        return 'checkstyle';
    }

    /**
     * @return Data
     */
    public function getData()
    {
        return simplexml_load_file($this->inFile->getRealPath());
    }
}
