<?php
namespace CodeReport\Report\FileParser;

class PHPLoc extends AbstractParser
{
    /**
     * Get the human readable name for the format
     *
     * @return string
     */
    public function getRealName()
    {
        return 'PHPLoc';
    }

    /**
     * Get the simple name for the format used for template and output file names
     *
     * @return string
     */
    public function getFilename()
    {
        return 'phploc';
    }

    /**
     * Get a parsed representation of the raw data
     *
     * @return mixed
     */
    public function getData()
    {
        $data = array(
            'directories' => $this->extractValue('#Directories\s+([0-9]+)#'),
            'files' => $this->extractValue('#Files\s+([0-9]+)#'),
            'size' => array(
                'loc' => $this->extractValue('#Lines of Code \(LOC\)\s+([0-9]+)#'),
                'cloc' => $this->extractValue('#Comment Lines of Code \(CLOC\)\s+([0-9]+)#'),
                'ncloc' => $this->extractValue('#Non-Comment Lines of Code \(NCLOC\)\s+([0-9]+)#'),
                'lloc' => $this->extractValue('#Logical Lines of Code \(LLOC\)\s+([0-9]+)#'),
                'classes' => $this->extractValue('#Classes\s+([0-9]+)#'),
                'class_length' => array(
                    'avg' => $this->extractValue('#Average Class Length\s+([0-9]+)#'),
                    'min' => $this->extractValue('#Minimum Class Length\s+([0-9]+)#'),
                    'max' => $this->extractValue('#Maximum Class Length\s+([0-9]+)#')
                ),
                'method_length' => array(
                    'avg' => $this->extractValue('#Average Method Length\s+([0-9]+)#'),
                    'min' => $this->extractValue('#Minimum Method Length\s+([0-9]+)#'),
                    'max' => $this->extractValue('#Maximum Method Length\s+([0-9]+)#')
                ),
                'functions' => $this->extractValue('#Functions\s+([0-9]+)#'),
                'function_length' => array(
                    'avg' => $this->extractValue('#Average Function Length\s+([0-9]+)#')
                ),
                'other' => $this->extractValue('#ot in classes or functions\s+([0-9]+)#')
            ),
            'cyclomatic_complexity' => array(
                'per_lloc' => 0,
                'per_class' => array('avg' => 0, 'min' => 0, 'max' => 0),
                'per_method' => array('avg' => 0, 'min' => 0, 'max' => 0)
            ),
            'dependencies' => array(
                'global_accesses' => array('total'=>0, 'constants' => 0, 'variables' => 0, 'super' => 0),
                'attribute_accesses' => array('total'=>0, 'static' => 0, 'nonstatic' => 0),
                'method_calls' => array('total'=>0, 'static' => 0, 'nonstatic' => 0),
            ),
            'structure' => array(
                'namespaces' => 0,
                'interfaces' => 0,
                'traits' => 0,
                'classes' => array('total' => 0, 'abstract' => 0, 'concrete' => 0),
                'method' => array('total' => 0, 'static' => 0, 'nonstatic' => 0, 'public' => 0, 'nonpublic' => 0),
                'functions' => array('named' => 0, 'anonymous' => 0),
                'constants' => array('global' => 0, 'class' => 0)
            )
        );

        return $data;
    }

    private function extractValue($pattern)
    {
        $matches = array();
        if (preg_match($pattern, $this->inFile->getContents(), $matches)) {
            return $matches[1];
        }
        return 0;
    }
}
