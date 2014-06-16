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
