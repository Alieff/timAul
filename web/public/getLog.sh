#!/bin/bash

a="$(cat ../../../temporary_log.txt)"

if [ ! -z "$a" -a "$a" != " " ]; then
        > ../../../temporary_log.txt
fi

echo "$a"

