Code Report
==============
[![Build Status](https://travis-ci.org/warmans/code-report.svg?branch=master)](https://travis-ci.org/warmans/code-report)[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/warmans/code-report/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/warmans/code-report/?branch=master)[![Code Coverage](https://scrutinizer-ci.com/g/warmans/code-report/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/warmans/code-report/?branch=master)

Generate attractive static HTML reports from raw code metrics. These are useful for CI servers which do not have
built in reports.

## Supported Input Formats
* [Phploc XML](https://github.com/sebastianbergmann/phploc)
* checkstyle

## Usage

    code-report generate [path to input file] [path to output directory]

### PhpLOC Example
    ./vendor/bin/phploc --log-xml phploc.xml src/
    ./code-report generate phploc.xml /tmp/code-report/.
    
### Checkstyle Example
    ./vendor/bin/phpcs --standard="PSR2" src/* --report-checkstyle=./checkstyle.xml
    ./code-report generate checkstyle.xml /tmp/code-report/.