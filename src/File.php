<?php
namespace CodeReport;

class File extends \SplFileObject
{
    public function findLine($pattern)
    {
        foreach ($this as $line) {
            if (preg_match($pattern, $line)) {
                return true;
            }
        }
        return false;
    }
}
