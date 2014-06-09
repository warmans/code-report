#!/bin/sh
if [ "$1" = "watch" ]
then 
    while true; do out=$(./vendor/bin/phpunit --colors --coverage-html /tmp/coredata-coverage tests/ 2>&1); clear; echo "$out"; sleep 1; done;
else
    ./vendor/bin/phpunit --colors --coverage-html /tmp/coredata-coverage tests/
fi
