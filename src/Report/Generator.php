<?php
namespace CodeReport\Report;

use CodeReport\Filesystem;
use Symfony\Component\Templating\EngineInterface;

/**
 * Report Report
 *
 * @package CodeReport
 */
class Generator
{
    const META_FILE = 'code-report.json';

    /**
     * @var Filesystem
     */
    private $filesystem;

    /**
     * @var \Symfony\Component\Templating\EngineInterface
     */
    private $templateEngine;

    /**
     * @param EngineInterface $templateEngine
     * @param Filesystem $filesystem
     */
    public function __construct(EngineInterface $templateEngine, Filesystem $filesystem)
    {
        $this->templateEngine = $templateEngine;
        $this->filesystem = $filesystem;
    }

    public function generateIndex($outputDir)
    {
        if ($meta = json_decode($this->filesystem->fileGetContents($outputDir.'/'.self::META_FILE), true)) {
            $this->filesystem->dumpFile(
                $outputDir.'/index.html',
                $this->templateEngine->render('index', array('data' => $meta))
            );
        }
    }

    /**
     * @param FileParser\AbstractParser $parser
     * @param $outputDir
     * @return string file written
     */
    public function generateReport(FileParser\AbstractParser $parser, $outputDir)
    {
        $outputDir = rtrim($outputDir, '/\\');
        if (!$this->filesystem->exists($outputDir)) {
            $this->filesystem->mkdir($outputDir);
        }

        //lock and update metadata
        $metaFile = "$outputDir/".self::META_FILE;

        $this->filesystem->lockedWrite($metaFile, function ($handle) use ($parser) {

            $metaData = array('reports'=>array());

            if ($existingMeta = json_decode(fgets($handle), true)) {
                $metaData['reports'] = array_merge($metaData['reports'], $existingMeta['reports']);
            }
            $metaData['reports'][$parser->getRealName()]  = array(
                'file' => "{$parser->getFilename()}.html",
                'description' => $parser->getDescription()
            );

            //flush to disk
            return json_encode($metaData);
        });

        //flush report
        $outfile = "$outputDir/{$parser->getFilename()}.html";
        $this->filesystem->dumpFile(
            $outfile,
            $this->templateEngine->render($parser->getFilename(), array('data' => $parser->getData()))
        );

        return $outfile;
    }
}
