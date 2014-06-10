<?php
namespace CodeReport\Console\Command;

use CodeReport\File;
use CodeReport\Report;
use CodeReport\Report\Generator;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @package CodeReport\Console\Command
 */
class Generate extends Command
{
    /**
     * @var \CodeReport\Generator
     */
    private $generator;

    /**
     * @var \CodeReport\Report\FileParser\ParserFactory
     */
    private $fileParserFactory;

    /**
     * @param Generator $generator
     * @param Report\FileParser\ParserFactory $fileParserFactory
     */
    public function __construct(Generator $generator, Report\FileParser\ParserFactory $fileParserFactory)
    {
        $this->generator = $generator;
        $this->fileParserFactory = $fileParserFactory;
        parent::__construct();
    }

    protected function configure()
    {
        $this->setName('generate')
            ->setDescription('Create a report from the given input file')
            ->addArgument('infile', InputArgument::REQUIRED, 'Path to input file')
            ->addArgument('outdir', InputArgument::REQUIRED, 'Directory to store outputs');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->generator->generateReport(
            $this->fileParserFactory->fromFile(new File($input->getArgument('infile'))),
            $input->getArgument('outdir')
        );
        $output->writeln('ok');
    }
}
