Code Report
==============
Generate attractive static HTML reports from raw code metrics. These are useful for CI servers which do not have
built in reports.

## Supported Input Formats
* PHPLOC XML

## Usage

code-report generate [path to input file] [path to output directory]

### PhpLOC

    ./vendor/bin/code-report generate [path to phploc.xml] /tmp/code-report/.