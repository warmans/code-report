Code Report
==============
Generate attractive static HTML reports from raw code metrics. These are useful for CI servers which do not have
built in reports.

## Supported Input Formats
* [Phploc XML](https://github.com/sebastianbergmann/phploc)

## Usage

    code-report generate [path to input file] [path to output directory]

### PhpLOC
    ./vendor/bin/phploc -log-xml phploc.xml src/
    ./vendor/bin/code-report generate phploc.xml /tmp/code-report/.