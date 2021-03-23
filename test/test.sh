#!/bin/bash
#
# OpenTHC Test Runner
#

set -o errexit
set -o nounset
# set -o pipefail

f=$(readlink -f "$0")
d=$(dirname "$f")

cd "$d"

output_base="../webroot/test-output"
output_main="$output_base/index.html"
mkdir -p "$output_base"


#
# Lint
echo '<h1>Linting...</h1>' > "$output_main"
find ../boot.php ../lib/ ../test/ -type f -name '*.php' -exec php -l {} \; \
	| grep -v 'No syntax' || true \
	2>&1 >"$output_base/phplint.txt"
[ -s "$output_base/phplint.txt" ] || echo "Linting OK" >"$output_base/phplint.txt"


#
# PHPUnit
echo '<h1>PHPUnit...</h1>' > "$output_main"
../vendor/bin/phpunit \
	--verbose \
	--log-junit "$output_base/output.xml" \
	--testdox-html "$output_base/testdox.html" \
	--testdox-text "$output_base/testdox.txt" \
	--testdox-xml "$output_base/testdox.xml" \
	"$@" 2>&1 | tee "$output_base/output.txt" || true


#
# Transform
echo '<h1>Transforming...</h1>' > "$output_main"
[ -f "report.xsl" ] || wget -q 'https://openthc.com/pub/phpunit/report.xsl'
xsltproc \
	--nomkdir \
	--output "$output_base/output.html" \
	report.xsl \
	"$output_base/output.xml"


#
# Final Output
dt=$(date)
note=$(tail -n1 "$output_base/output.txt")

cat <<HTML > "$output_main"
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="initial-scale=1, user-scalable=yes">
<meta name="theme-color" content="#247420">
<link rel="stylesheet" href="https://cdn.openthc.com/bootstrap/4.4.1/bootstrap.css" integrity="sha256-L/W5Wfqfa0sdBNIKN9cG6QA5F2qx4qICmU2VgLruv9Y=" crossorigin="anonymous">
<title>Test Result ${dt}</title>
</head>
<body>
<div class="container mt-4">
<div class="jumbotron">

<h1>Test Result ${dt}</h1>
<h2>${note}</h2>

<p>You can view the <a href="output.txt">raw script output</a>,
or the <a href="output.xml">Unit Test XML</a>
which we've processed <small>(via XSL)</small> to <a href="output.html">a pretty report</a>
which is also in <a href="testdox.html">testdox format</a>.
</p>

</div>
</div>
</body>
</html>
HTML
