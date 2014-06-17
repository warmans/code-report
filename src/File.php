<?php
namespace CodeReport;

/**
 * File Object
 *
 * @package CodeReport
 */
class File extends \SplFileObject
{
    /**
     * Scan the file to find a line that matches the given pattern
     *
     * @param $pattern
     * @return bool
     */
    public function findLine($pattern)
    {
        foreach ($this as $line) {
            if (preg_match($pattern, $line)) {
                return true;
            }
        }
        return false;
    }

    /**
     * Get a line from a file with a given number of surrounding lines as context
     *
     * @param $num
     * @param int $context
     * @return array
     */
    public function getLine($num, $context=2)
    {
        $start = $num - $context;
        $this->seek(($start > 0 ? $start : 0));

        $cxtToRead = $context+1;
        $lines = array();
        while(!$this->eof() && ($cxtToRead-- >= 0)) {
            $lines[] = $this->current();
            $this->next();
        }

        return $lines;
    }

    /**
     * @return string
     */
    public function getContents()
    {
        $buff = '';
        foreach ($this as $line) {
            $buff .= "$line\n";
        }
        return $buff;
    }
}
