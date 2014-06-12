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

    public function getData()
    {
        return $this->getDataXml();
    }


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

    /**
     * Get a parsed representation of the raw data
     *
     * @return mixed
     */
    public function getDataCsv()
    {
        ini_set("auto_detect_line_endings", true);

        $this->inFile->rewind();
        $data = array();

        while($row = $this->inFile->fgets()){

            //why sebastian?!
            $row = explode(',', str_replace('\n\r', '\n', $row));

            if (count($data) === 0) {
                foreach ($row as $name) {
                    $data[trim($name)] = array();
                }
                $index_map = $row;
                continue;
            }

            foreach ($row as $index => $value) {
                if (isset($index_map[$index])) {
                    $data[trim($index_map[$index])][] = trim($value, '"');
                }
            }
        }
        return new Data($data);
    }
}
