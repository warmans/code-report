<?php
namespace CodeReport\Generator\FileParser;

/**
 * @package CodeReport\Generator
 */
interface ParserInterface
{
    /**
     * Get the human readable name for the format
     *
     * @return string
     */
    public function getRealName();

    /**
     * Get the simple name for the format used for template and output file names
     *
     * @return string
     */
    public function getFilename();

    /**
     * Import the raw data
     *
     * @param string $raw
     */
    public function import($raw);

    /**
     * Get a parsed representation of the raw data
     *
     * @return mixed
     */
    public function getData();
}
