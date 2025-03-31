<?php
/**
 * SPDX-License-Identifier: MIT
 */

use \OpenTHC\Bunk\BioTrack\Base;

/*
Failure:
{"error":"Please provide a room id.","success":0,"errorcode":"603"}

Success::

Next: {"success":1,"transactionid":"24482138"}
*/

if (empty($json['id'])) {
	return $RES->withJSON(array(
		'error' => "Please provide a room id.",
		'success' => 0,
		'errorcode' => "603",
	));
}

// Should Make a new Room
$txn = Base::_rnd_transaction_id();

// $dbc = new SQL($_SESSION['Company']['dsn']);
// $dbc->insert('section', [
// 	'id' => $json['id'],
// 	'name' => $json['name'],
// 	'type' => 'INVENTORY',
// 	'meta' => [
// 		"deleted" => "0",
// 		"location" => $json['location'],
// 		"name" => $json['name'],
// 		"quarantine" => "1",
// 		// "roomid" => "1",
// 		// "transactionid" => "4032",
// 		'transactionid' => $txn,
// 		'transactionid_original' => $txn,
// 	]
// ]);

return $RES->withJSON(array(
	'success' => 1,
	'transactionid' => $txn,
));
