<?php
/**
 * Return a Transfer Manifest
 *
 * SPDX-License-Identifier: MIT
 */

use \OpenTHC\Bunk\BioTrack\Base;


$out = array();
$out['success'] = 1;
$out['manifest'] = array();
$out['manifest_stop_data'] = array();
$out['manifest_stop_items'] = array();

$out['manifest'][] = array(
		"completion_date" => "1389796859",
		"deleted" => "0",
		"fulfilled" => "1",
		"location" => "999999",
		"manifestid" => "3692253654269107",
		"origination_city" => "Seattle",
		"origination_license_number" => "189",
		"origination_name" => "Trade 24",
		"origination_phone" => "222-333-4444",
		"origination_state" => "WA",
		"origination_street" => "2135 Address Way",
		"origination_zip" => "98101",
		"sessiontime" => $time,
		"stopcount" => "1",
		"total_item_count" => "1",
		"transactionid" => "9821",
		"transactionid_original" => "9821",
		"transporter_dob" => "01/01/1980",
		"transporter_id" => "23486",
		"transporter_name" => "New Employee",
		"transporter_vehicle_details" => "Black Chevy Cavalier 23856",
		"transporter_vehicle_identification" => "32495954656",
);

$out['manifest_stop_data'][] = array(
		"arrive_time" => "1389886803",
		"city" => "Tacoma",
		"depart_time" => "1389885003",
		"item_count" => "1",
		"license_number" => "11111",
		"location" => "999999",
		"manifestid" => "3692253654269107",
		"name" => "Some Retail Location",
		"phone" => "444-555-6666",
		"sessiontime" => $time,
		"state" => "WA",
		"stopnumber" => "1",
		"street" => "22993 New Road Way",
		"transactionid" => "9821",
		"transactionid_original" => "9821",
		"travel_route" => "Head southwest.",
		"zip" => "98295",
		"deleted" => "0",
);
		// manifest_stop_items
$opt['manifest_stop_items'][] = array(
		"description" => "Usable Marijuana",
		"inventoryid" => "0000000090000033",
		"location" => "999999",
		"manifestid" => "3692253654269107",
		"quantity" => "15.00",
		"sessiontime" => $time,
		"stopnumber" => "1",
		"transactionid" => "9821",
		"transactionid_original" => "9821",
		"deleted" => "0",
);

return $RES->withJSON($out);
