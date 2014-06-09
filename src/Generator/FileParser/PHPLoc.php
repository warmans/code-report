<?php
namespace CodeReport\Generator\FileParser;

class PHPLoc implements ParserInterface
{
    /**
     * Get the human readable name for the format
     *
     * @return string
     */
    public function getRealName()
    {
        return 'PHPLoc';
    }

    /**
     * Get the simple name for the format used for template and output file names
     *
     * @return string
     */
    public function getFilename()
    {
        return 'phploc';
    }

    /**
     * Import the raw data
     *
     * @param string $raw
     */
    public function import($raw)
    {
        // TODO: Implement import() method.
    }

    /**
     * Get a parsed representation of the raw data
     *
     * @return mixed
     */
    public function getData()
    {
        // TODO: Implement getData() method.
        return array();
    }
}
