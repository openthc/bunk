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
$out['manifest_stop_items'][] = array(
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

// @gitlab app#1654
$out['manifest'][] = array(
	"origination_city" => "Pena Blanca",
	"transporter_vehicle_identification" => "ZZZZZZZZZZZZZZZZZ",
	"sessiontime" => 1688155908,
	"origination_zip" => "00000",
	"transporter_dob" => "01/01/1970",
	"origination_phone" => "855-976-9333",
	"transactionid_original" => 63744869,
	"origination_license_number" => "990001",
	"stopcount" => 1,
	"origination_state" => "NM",
	"origination_name" => "Mock Grower",
	"transactionid" => 63744869,
	"deleted" => 0,
	"completion_date" => "1688155908",
	"transporter_id" => "001",
	"origination_street" => "123 Main St",
	"total_item_count" => 1,
	"transporter_name" => "Contact 1",
	"manifestid" => "7288034569537775",
	"transporter_vehicle_details" => "A Vehicle",
	"location" => "990001",
	"fulfilled" => 0
);
$out['manifest_stop_data'][] = array(
	'manifestid' => "7288034569537775",
	'license_number' => "R999999",
	'city' => "Albuquerque",
	'travel_route' => "go the distance",
	'location' => "999999",
	'street' => "123 Main St",
	'phone' => "855-976-9333",
	'stopnumber' => "1",
	'state' => "NM",
	'name' => "A Retail",
	'item_count' => 1,
	'deleted' => 0,
	'transactionid' => 63744869,
	'arrive_time' => "1688191200",
	'zip' => "00000",
	'sessiontime' => 1688155908,
	'depart_time' => "1688191200",
	'transactionid_original' => 63744869,
);
$out['manifest_stop_items'][] = array(
	'transactionid_original' => 63744869,
	'quantity' => "1",
	'stopnumber' => "1",
	'requiresweighing' => null,
	'sessiontime' => 1688155908,
	'transactionid' => 63744869,
	'deleted' => 0,
	'location' => "999999",
	'inventoryid' => "2023184130600000",
	'description' => "Preroll",
	'manifestid' => "7288034569537775",
);
return $RES->withJSON($out);
