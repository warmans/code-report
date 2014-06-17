<?php
namespace CodeReport\Template;

use CodeReport\Filesystem;
use Symfony\Component\Templating\Helper\Helper;

class CodeHelper extends Helper
{
    /**
     * @var Filesystem
     */
    private $filesystem;

    /**
     * @param Filesystem $filesystem
     */
    public function __construct(Filesystem $filesystem)
    {
        $this->filesystem = $filesystem;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'code';
    }

    public function getLine($filename, $line, $context=2)
    {
        if (!$this->filesystem->exists($filename)) {
            throw new \RuntimeException('File not found: '.$filename);
        }

        $file = $this->filesystem->getFile($filename);
        return $file->getLine($line, $context);
    }
}
