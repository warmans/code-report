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
        $metaFile = "$outputDir/code-report.json";
        $templateEngine = $this->templateEngine;
        //lock and update metadata

        $this->filesystem->lockedWrite($metaFile, function ($filesystem) use ($templateEngine, $metaFile, $parser) {
            //parse meta
            $metaData = array('reports'=>array());
            if ($existingMeta = json_decode($filesystem->fileGetContents($metaFile), true)) {
                $meta_data['reports'] = array_merge($metaData['reports'], $existingMeta['reports']);
            }
            $metaData['reports'][$parser->getRealName()]  = "{$parser->getFilename()}.html";

            //add to templates
            $templateEngine->addGlobal('meta', $metaData);

            //flush to disk
            return json_encode($metaData);
        });

        $outfile = "$outputDir/{$parser->getFilename()}.html";

        //flush report
        $this->filesystem->dumpFile(
            $outfile,
            $this->templateEngine->render($parser->getFilename(), array('data' => $parser->getData()))
        );

        return $outfile;
    }
}
