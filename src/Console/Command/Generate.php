<?php
namespace CodeReport\Console\Command;

use CodeReport\Generator;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class Generate extends Command
{
    private $generator;
    private $fileParserFactory;

    public function __construct(Generator $generator, Generator\FileParser\ParserFactory $fileParserFactory)
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

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->generator->generateReport(
            $this->fileParserFactory->fromFile($input->getArgument('infile')),
            $input->getArgument('outdir')
        );
        $output->writeln('ok');
    }
}
