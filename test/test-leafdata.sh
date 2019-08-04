#!/bin/bash
#
# Run Bunch of LeafData Tests
#

f=$(readlink -f "$0")
d=$(dirname "$f")

cd "$d"

test_path="${1:-LeafData}"

output_path="../webroot/test-output"

../vendor/bin/phpunit "$test_path" 2>&1 | tee "../webroot/test-output/output.txt"

#
# Fetch the Transform
if [ ! -f "phpunit-report.xsl" ]
then
	wget https://openthc.com/css/phpunit-report.xsl
fi

#
# Transform
xsltproc \
	--nomkdir \
	--output "${output_path}/phpunit.html" \
	./phpunit-report.xsl \
	"${output_path}/phpunit.xml"

dt=$(date)

#
# Make a friendly page
cat > ../webroot/test-output/index.html <<HTML
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="mobile-web-app-capable" content="yes">
<meta name="viewport" content="initial-scale=1, user-scalable=yes">
<meta name="application-name" content="OpenTHC">
<meta name="apple-mobile-web-app-title" content="OpenTHC">
<meta name="msapplication-TileColor" content="#247420">
<meta name="theme-color" content="#247420">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha256-YLGeXaapI0/5IgZopewRJcFXomhRMlYYjugPLSyNjTY=" crossorigin="anonymous" />
<title>Test Result ${dt}</title>
</head>
<body>

<div class="container mt-4">
<div class="jumbotron">

<h1>Test Results ${dt}</h1>

<p>You can view the <a href="output.txt">raw script output</a>,
or the <a href="phpunit.xml">Unit Test XML</a>
which we've processed <small>(via XSL)</small> to <a href="phpunit.html">a pretty report</a>
which is also in <a href="testdox.html">testdox format</a>.
</p>

</div>
</div>
</body>
</html>
HTML
