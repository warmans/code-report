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
     * Get a parsed representation of the raw data
     *
     * @return mixed
     */
    public function getData()
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

    private function extractValue($pattern)
    {
        $matches = array();
        if (preg_match($pattern, $this->inFile->getContents(), $matches)) {
            return $matches[1];
        }
        return 0;
    }
}
