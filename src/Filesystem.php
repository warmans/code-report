<?php
namespace CodeReport;

use Symfony\Component\Filesystem\Exception\IOException;

/**
 * @package CodeReport
 */
class Filesystem extends \Symfony\Component\Filesystem\Filesystem
{

    public function getFile($path)
    {
        return new File($path);
    }

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
        if ($h = fopen($filename, 'r+')) {
            //lock
            flock($h, LOCK_EX);

            //do things with handle
            $new = $content($h);

            //truncate old
            fseek($h, 0);
            ftruncate($h, 0);

            //write new
            fwrite($h, $new);

            //unlock
            flock($h, LOCK_UN);
        } else {
            throw new IOException("Unable to open $filename for writing");
        }
    }
}
