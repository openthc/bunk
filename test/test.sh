#!/bin/bash
#
# OpenTHC Test Runner
#

#set -o errexit
set -o nounset
# set -o pipefail

f=$(readlink -f "$0")
d=$(dirname "$f")
dt=$(date)

cd "$d"

output_path="../webroot/test-output"
if [ ! -d "$output_path" ]
then
	mkdir "$output_path"
fi

output_main="$output_path/index.html"

echo '<h1>Tests Started</h1>' > "$output_main"


#
#
../vendor/bin/phpunit \
	"$@" 2>&1 | tee "$output_path/output.txt"
	#--log-junit "$output_path/output.xml" \
	#--testdox-html "$output_path/testdox.html" \
	#--testdox-text "$output_path/testdox.txt" \
	#--testdox-xml "$output_path/testdox.xml" \
	#--verbose \

# if [[ $ret != 0 ]]
# then
# 	echo "PHPUnit Failed"
# 	exit 1;
# fi
note=$(tail -n1 "$output_path/output.txt")

echo '<h1>Tests Completed</h1>' > "$output_main"

#
# Get Transform
echo '<h1>Transforming...</h1>' > "$output_main"
curl -qs https://openthc.com/pub/phpunit/report.xsl > report.xsl
xsltproc \
	--nomkdir \
	--output "$output_path/output.html" \
	report.xsl \
	"$output_path/output.xml"

#
# Final Ouptut
cat <<HTML > "$output_main"
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="initial-scale=1, user-scalable=yes">
<meta name="theme-color" content="#247420">
<link rel="stylesheet" href="https://cdn.openthc.com/bootstrap/4.4.1/bootstrap.css" integrity="sha256-L/W5Wfqfa0sdBNIKN9cG6QA5F2qx4qICmU2VgLruv9Y=" crossorigin="anonymous">
<title>Test Result $dt</title>
</head>
<body>
<div class="container mt-4">
<div class="jumbotron">

<h1>Test Result $dt</h1>
<h2>$note</h2>

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
