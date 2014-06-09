#!/bin/sh
if [ "$1" = "watch" ]
then
    while true; do out=$(./vendor/bin/phpcs --standard=PSR2 src/* tests/* code-report 2>&1); clear; echo "$out"; sleep 3; done;
else
    ./vendor/bin/phpcs --standard=PSR2 src/* tests/* code-report
fi
