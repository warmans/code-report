<?php
namespace CodeReport\Report\FileParser;

use CodeReport\File;

abstract class AbstractParser
{
    protected $inFile;

    public function __construct(File $input)
    {
        $this->inFile = $input;
    }

    /**
     * Get the human readable name for the format
     *
     * @return string
     */
    abstract public function getRealName();

    /**
     * Get the simple name for the format used for template and output file names
     *
     * @return string
     */
    abstract public function getFilename();

    /**
     * Provide a description of the report content
     *
     * @return string
     */
    abstract public function getDescription();


    /**
     * Get a parsed representation of the raw data
     *
     * @return mixed
     */
    abstract public function getData();
}
