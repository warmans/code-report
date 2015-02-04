<?php
namespace CodeReport\Report\FileParser;

use CodeReport\Report\Data;

class PHPLoc extends AbstractParser
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
     * Provide a description of the report content
     *
     * @return string
     */
    public function getDescription()
    {
        return 'Code metrics such as lines of code, number of classes, number of globals etc.';
    }

    /**
     * @return Data
     */
    public function getData()
    {
        return $this->getDataXml();
    }

    /**
     * Parse an PHPLOC XML Report
     *
     * @return Data
     */
    public function getDataXml()
    {
        $data = array();
        $xml = simplexml_load_string($this->inFile->getContents());
        foreach ($xml->children() as $node) {
            if (isset($data[$node->getName()])) {
                $data[$node->getName()][] = (string)$node;
            } else {
                $data[$node->getName()] = array((string)$node);
            }
        }
        return new Data($data);
    }
}
