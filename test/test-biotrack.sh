#!/bin/bash
#
# Test A BioTrack System
#

f=$(readlink -f "$0")
d=$(dirname "$f")

cd "$d"

test_path="${1:-BioTrack}"

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

<h1>BioTrack Test Results ${dt}</h1>

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

exit

#
#
#_curl_biotrack '{ "action": "sync_vendor" }'
#_curl_biotrack '{ "action": "sync_qa_lab" }'
#_curl_biotrack '{ "action": "sync_third_party_transporter" }'


#
#
##_curl '{ "action": "plant_new", "location": "$LICENSE", "source": "################", "quantity": 5, "room": 5, "strain": "Text", "mother": 1 }'
##_curl '{ "action": "plant_harvest", "barcodeid": "################", "collectadditional": 0, "new_room": "5", "weights" : [] }'
##_curl '{ "action": "plant_cure", "location": "$LICENSE", "barcodeid": [ "################" ], "weights": [ {} ] }'

#
#
#_curl "699999990" "499990" '{ "action": "inventory_manifest", "location": "499990" }'
#_curl "699999991" "499991" '{ "action": "inventory_manifest_pickup", "location": "499991" }'
#_curl "699999992" "499992" '{ "action": "inventory_manifest_third_party", "location": "499992" }'

# Search for Inbound Manifests
#_curl "" "" '{ "action": "inventory_manifest_lookup", "location": "$LICENSE" }'

#
# View Details of Inbound Manifest
#_curl '{ "action": "inventory_transfer_lookup", "location": "499995",  }'
#_curl '{ "action": "inventory_transfer_outbound", "location": "$LICENSE",  }'
#_curl '{ "action": "inventory_transfer_inbound", "location": "$LICENSE",  }'

#
#
##_curl '{ "action": "plant_convert_to_inventory", }'
##_curl '{ "action": "plant_move", }'
##_curl '{ "action": "plant_destroy_schedule", }'
##_curl '{ "action": "plant_destroy", }'
##_curl '{ "action": "plant_waste_weigh", }'

#
#
##_curl '{ "action": "inventory_adjust", }'
##_curl '{ "action": "inventory_adjust_usable", }'
##_curl '{ "action": "inventory_convert", }'
##_curl '{ "action": "inventory_sample", }'
##_curl '{ "action": "inventory_split", }'


function _curl_post()
{
	curl \
		-X POST \
		--header 'Accept: application/json' \
		--header 'Content-Type: text/json' \
		--data "$1" \
		https://bunk.openthc.org/biotrack/v2013/serverjson.asp

}

_curl_post '{ "action": "login", "license_number": "999999999", "username": "bunk@openthc.org", "password": "Password1234" }'

_curl_post '{ "action": "sync_check" }'
_curl_post '{ "action": "sync_employee" }'
_curl_post '{ "action": "sync_inventory" }'
_curl_post '{ "action": "sync_inventory_adjust" }'
_curl_post '{ "action": "sync_inventory_qa_sample" }'
_curl_post '{ "action": "sync_inventory_room" }'
_curl_post '{ "action": "sync_inventory_sample" }'
_curl_post '{ "action": "sync_inventory_transfer" }'
_curl_post '{ "action": "sync_inventory_transfer_inbound" }'
_curl_post '{ "action": "sync_manifest" }'
_curl_post '{ "action": "sync_plant" }'
_curl_post '{ "action": "sync_plant_derivative" }'
_curl_post '{ "action": "sync_plant_room" }'
_curl_post '{ "action": "sync_qa_lab" }'
_curl_post '{ "action": "sync_sale" }'
_curl_post '{ "action": "sync_tax_report" }'
_curl_post '{ "action": "sync_third_party_transporter" }'
_curl_post '{ "action": "sync_vehicle" }'
_curl_post '{ "action": "sync_vendor" }'

_curl_post '{ "action": "employee_add" }'
_curl_post '{ "action": "employee_modify" }'
_curl_post '{ "action": "employee_remove" }'
_curl_post '{ "action": "inventory_adjust" }'
_curl_post '{ "action": "inventory_adjust_usable" }'
_curl_post '{ "action": "inventory_check" }'
_curl_post '{ "action": "inventory_convert" }'
_curl_post '{ "action": "inventory_convert_undo" }'
_curl_post '{ "action": "inventory_create_lot" }'
_curl_post '{ "action": "inventory_destroy" }'
_curl_post '{ "action": "inventory_destroy_schedule" }'
_curl_post '{ "action": "inventory_destroy_schedule_undo" }'
_curl_post '{ "action": "inventory_manifest" }'
_curl_post '{ "action": "inventory_manifest_lookup" }'
_curl_post '{ "action": "inventory_manifest_pickup" }'
_curl_post '{ "action": "inventory_manifest_third_party" }'
_curl_post '{ "action": "inventory_manifest_void" }'
_curl_post '{ "action": "inventory_manifest_void_items" }'
_curl_post '{ "action": "inventory_manifest_void_stop" }'
_curl_post '{ "action": "inventory_modify" }'
_curl_post '{ "action": "inventory_move" }'
_curl_post '{ "action": "inventory_new" }'
_curl_post '{ "action": "inventory_qa_check" }'
_curl_post '{ "action": "inventory_qa_check_all" }'
_curl_post '{ "action": "inventory_qa_sample" }'
_curl_post '{ "action": "inventory_qa_sample_non_mandatory" }'
_curl_post '{ "action": "inventory_qa_sample_results" }'
_curl_post '{ "action": "inventory_qa_sample_void" }'
_curl_post '{ "action": "inventory_room_add" }'
_curl_post '{ "action": "inventory_room_modify" }'
_curl_post '{ "action": "inventory_room_remove" }'
_curl_post '{ "action": "inventory_sample" }'
_curl_post '{ "action": "inventory_split" }'
_curl_post '{ "action": "inventory_transfer_inbound" }'
_curl_post '{ "action": "inventory_transfer_inbound_modify" }'
_curl_post '{ "action": "inventory_transfer_lookup" }'
_curl_post '{ "action": "inventory_transfer_outbound" }'
_curl_post '{ "action": "inventory_transfer_outbound_modify" }'
_curl_post '{ "action": "inventory_transfer_outbound_return_lookup" }'
_curl_post '{ "action": "inventory_transfer_outbound_void" }'
_curl_post '{ "action": "plant_convert_to_inventory" }'
_curl_post '{ "action": "plant_cure" }'
_curl_post '{ "action": "plant_destroy" }'
_curl_post '{ "action": "plant_destroy_schedule" }'
_curl_post '{ "action": "plant_harvest" }'
_curl_post '{ "action": "plant_harvest_schedule" }'
_curl_post '{ "action": "plant_modify" }'
_curl_post '{ "action": "plant_move" }'
_curl_post '{ "action": "plant_new" }'
_curl_post '{ "action": "plant_room_add" }'
_curl_post '{ "action": "plant_room_modify" }'
_curl_post '{ "action": "plant_room_remove" }'
_curl_post '{ "action": "plant_waste_weigh" }'
_curl_post '{ "action": "plant_yield_modify" }'
_curl_post '{ "action": "sale_dispense" }'
_curl_post '{ "action": "sale_modify" }'
_curl_post '{ "action": "sale_refund" }'
_curl_post '{ "action": "sale_void" }'
_curl_post '{ "action": "tax_obligation_file" }'
_curl_post '{ "action": "user_add" }'
_curl_post '{ "action": "user_modify" }'
_curl_post '{ "action": "user_remove" }'
_curl_post '{ "action": "vehicle_add" }'
_curl_post '{ "action": "vehicle_modify" }'
_curl_post '{ "action": "vehicle_remove" }'
