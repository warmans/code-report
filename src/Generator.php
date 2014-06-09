<?php
namespace CodeReport;

use Symfony\Component\Templating\EngineInterface;

/**
 * Report Generator
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
     * @param Generator\FileParser\ParserInterface $data
     * @param $outputDir
     */
    public function generateReport(Generator\FileParser\ParserInterface $data, $outputDir)
    {
        $outputDir = rtrim($outputDir, '/\\');
        $outFile = "$outputDir/{$data->getFilename()}.html";
        $metaFile = "$outputDir/code-report.json";

        //flush report
        $this->filesystem->dumpFile(
            $outFile,
            $this->templateEngine->render($data->getFilename(), array('data' => $data))
        );

        //lock and update metadata
        $this->filesystem->lockedWrite($metaFile, function ($filesystem) use ($metaFile, $outFile, $data) {
            $meta_data = array('reports'=>array());
            if ($existing_meta = json_decode($filesystem->fileGetContents($metaFile), true)) {
                $meta_data['reports'] = array_merge($meta_data['reports'], $existing_meta['reports']);
            }
            $meta_data['reports'][$data->getRealName()]  = $outFile;
            return json_encode($meta_data);
        });
    }
}
