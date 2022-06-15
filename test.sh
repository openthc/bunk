#!/bin/bash -x
#
# OpenTHC Test Runner
#

set -o errexit
set -o nounset

x=${OPENTHC_TEST_BASE:-}
if [ -z "$x" ]
then
	echo "You have to define the environment first"
	exit 1
fi

f=$(readlink -f "$0")
d=$(dirname "$f")

cd "$d"

output_base="webroot/test-output"
output_main="$output_base/index.html"
mkdir -p "$output_base"

code_list=(
	boot.php
	lib/
	test/
)


OUTPUT_BASE="${output_base}"
OUTPUT_MAIN="${output_main}"
SOURCE_LIST="${code_list}"

export OUTPUT_BASE OUTPUT_MAIN SOURCE_LIST


#
# Lint
if [ ! -f "$output_base/phplint.txt" ]
then

	echo '<h1>Linting...</h1>' > "$output_main"

	find "${code_list[@]}" -type f -name '*.php' -exec php -l {} \; \
		| grep -v 'No syntax' \
		>"$output_base/phplint.txt" \
		2>&1 \
		|| true

	[ -s "$output_base/phplint.txt" ] || echo "Linting OK" >"$output_base/phplint.txt"

fi


#
# PHP-CPD
vendor/openthc/common/test/phpcpd.sh


#
# PHPStan
vendor/openthc/common/test/phpstan.sh


#
# PHPUnit
echo '<h1>PHPUnit...</h1>' > "$output_main"
vendor/bin/phpunit \
	--configuration "test/phpunit.xml" \
	--log-junit "$output_base/phpunit.xml" \
	--testdox-html "$output_base/testdox.html" \
	--testdox-text "$output_base/testdox.txt" \
	--testdox-xml "$output_base/testdox.xml" \
	"$@" 2>&1 | tee "$output_base/phpunit.txt"


#
# Transform
echo '<h1>Transforming...</h1>' > "$output_main"
[ -f "report.xsl" ] || wget -q 'https://openthc.com/pub/phpunit/report.xsl'
xsltproc \
	--nomkdir \
	--output "$output_base/phpunit.html" \
	report.xsl \
	"$output_base/phpunit.xml"


#
# Final Output
dt=$(date)
note=$(tail -n1 "$output_base/phpunit.txt")

cat <<HTML > "$output_main"
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="initial-scale=1, user-scalable=yes">
<meta name="theme-color" content="#069420">
<style>
html {
	font-family: sans-serif;
	font-size: 1.5rem;
}
</style>
<title>Test Result ${dt}</title>
</head>
<body>

<h1>Test Result ${dt}</h1>
<h2>${note}</h2>

<p>Linting: <a href="phplint.txt">phplint.txt</a></p>
<p>PHPStan: <a href="phpstan.xml">phpstan.xml</a> and <a href="phpstan.html">phpstan.html</a></p>
<p>PHPUnit: <a href="phpunit.txt">phpunit.txt</a>, <a href="phpunit.xml">phpunit.xml</a> and <a href="phpunit.html">phpunit.html</a></p>
<p>Textdox: <a href="testdox.txt">testdox.txt</a>, <a href="testdox.xml">testdox.xml</a> and <a href="testdox.html">testdox.html</a></p>

</body>
</html>
HTML
