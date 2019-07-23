#!/bin/bash
#
#
#

f=$(readlink -f "$0")
d=$(dirname "$f")

cd "$d"

if [ ! -f "phpunit-report.xsl" ]
then
	wget https://openthc.com/css/phpunit-report.xsl
fi

xsltproc \
	--nomkdir \
	--output "../webroot/reports/phpunit.html"
	./phpunit-report.xsl ../webroot/reports/phpunit.xml
