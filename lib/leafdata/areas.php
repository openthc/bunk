<?php
/**
	Generate Fake Areas for LeafData
*/

use App\Module\LeafData;

$min = mt_rand(1000, 9999);
$max = 10;

$ret = array(
	'total' => $max,
	'per_page' => 2500, // always
	'current_page' => 1,
	'last_page' => 1,
	'next_page_url' => null,
	'prev_page_url' => null,
	'from' => 1,
	'to' => $max,
	'data' => array(),
);

for ($idx = 0; $idx < $max; $idx++) {

	$oid = LeafData::generateId($min + $idx);

	$ret['data'][] = array(
		'global_id' => sprintf('LDTEST1.AR%s', $oid), // "WAJ412015.AR5RO"
		'created_at' => "02\/01\/2018 03:00pm",
		"deleted_at" => null,
		"updated_at" => "02\/01\/2018 03:00pm",
		"name" => sprintf('Test Room %s', $oid),
		"type" => "non-quarantine",
		"is_quarantine_area" => "0",
		"external_id" => null,
	);

	//,{"created_at":"02\/01\/2018 03:00pm","updated_at":"02\/01\/2018 03:00pm","external_id":"bt:system","name":"-Bulk Inventory-","type":"non-quarantine","deleted_at":null,"is_quarantine_area":"0","global_id":"WAJ412015.AR5RP"},{"created_at":"02\/01\/2018 03:00pm","updated_at":"02\/01\/2018 03:00pm","external_id":"bt:1","name":"Bulk Plant_1","type":"non-quarantine","deleted_at":null,"is_quarantine_area":"0","global_id":"WAJ412015.AR5RQ"},{"created_at":"02\/01\/2018 03:00pm","updated_at":"02\/01\/2018 03:00pm","external_id":"bt:1209961","name":"CLONES","type":"non-quarantine","deleted_at":null,"is_quarantine_area":"0","global_id":"WAJ412015.AR5RR"},{"created_at":"02\/01\/2018 03:00pm","updated_at":"02\/01\/2018 03:00pm","external_id":"bt:719906","name":"DRY ROOM - bins","type":"non-quarantine","deleted_at":null,"is_quarantine_area":"0","global_id":"WAJ412015.AR5RS"},{"created_at":"02\/01\/2018 03:00pm","updated_at":"02\/01\/2018 03:00pm","external_id":"bt:1209985","name":"DRY ROOM - hanging","type":"non-quarantine","deleted_at":null,"is_quarantine_area":"0","global_id":"WAJ412015.AR5RT"},{"created_at":"02\/01\/2018 03:00pm","updated_at":"02\/01\/2018 03:00pm","external_id":"bt:1209992","name":"Dry Weight Clear Bins","type":"non-quarantine","deleted_at":null,"is_quarantine_area":"0","global_id":"WAJ412015.AR5RU"}
}

return $RES->withJSON($ret);
