<?php
namespace CodeReport;

use Symfony\Component\Filesystem\Exception\IOException;

/**
 * @package CodeReport
 */
class Filesystem extends \Symfony\Component\Filesystem\Filesystem
{
    /**
     * @param $filename
     * @return string
     */
    public function fileGetContents($filename)
    {
        return file_get_contents($filename);
    }

    /**
     * @param $filename
     * @param callable $content
     * @throws \Symfony\Component\Filesystem\Exception\IOException
     */
    public function lockedWrite($filename, \Closure $content)
    {
        if ($h = fopen($filename, 'w+')) {
            flock($h, LOCK_EX);
            fwrite($h, $content($this));
            flock($h, LOCK_UN);
        } else {
            throw new IOException("Unable to open $filename for writing");
        }
    }
}
