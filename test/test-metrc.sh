#!/bin/bash -x
#
# Test A METRC System
#

f=$(readlink -f "$0")
d=$(dirname "$f")

cd "$d"

test_path="${1:-METRC}"

output_path="../webroot/test-output"

../vendor/bin/phpunit "$test_path" 2>&1 | tee "../webroot/test-output/output.txt"
