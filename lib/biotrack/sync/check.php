<?php
/**
 * Bunk sync_check
 */

use \OpenTHC\Bunk\BioTrack\Base;

$ret = array(
	'success' => 1,
	'summary' => array(),
);

// Build Response of all Table descriptors
foreach (Base::$obj_list as $stub => $name) {
	$ret['summary'][] = array(
		'table' => $stub,
		'match' => rand(0, 1), // @todo Toggle 0|1
		'sum' => Base::_rnd_transaction_id(),
	);
}

return $RES->withJSON($ret);

/*
REQUEST
{
	"API": "4.0",
	"sessionid": "9cac343955a67cd5ea84b28ad53bed20923eb2183e6824a7166d72af69888cc58b0632867f1a084bae739bb4098095f53a44e122e6e36ca2dd667e1e4bd58be9",
	"training": 1,
	"nonce": "04350ad6da4b0c1bfd325c4a5f6fd8c81d1be349"
	"action": "sync_check",
	"download": "0",
	"data": [
		{
			"table": "vendor",
			"transaction_start": 534109
		},
		{
			"table": "qa_lab",
			"transaction_start": 650098
		},
		{
			"table": "third_party_transporter",
			"transaction_start": 0
		},
		{
			"table": "employee",
			"transaction_start": 634349
		},
		{
			"table": "vehicle",
			"transaction_start": 317744
		},
		{
			"table": "inventory_room",
			"transaction_start": 651466
		},
		{
			"table": "plant_room",
			"transaction_start": 651465
		},
		{
			"table": "inventory",
			"transaction_start": 651463
		},
		{
			"table": "plant",
			"transaction_start": 651166
		},
		{
			"table": "plant_derivative",
			"transaction_start": 651166
		},
		{
			"table": "manifest",
			"transaction_start": 640581
		},
		{
			"table": "inventory_transfer",
			"transaction_start": 650952
		},
		{
			"table": "inventory_transfer_inbound",
			"transaction_start": 62002
		},
		{
			"table": "inventory_sample",
			"transaction_start": 647384
		},
		{
			"table": "inventory_qa_sample",
			"transaction_start": 613998
		},
		{
			"table": "inventory_adjust",
			"transaction_start": 650645
		},
		{
			"table": "tax_report",
			"transaction_start": 296942
		}
	],
}
*/

// Example Response
/*
{
	"summary": [
		{
			"sum": "534109",
			"match": 0,
			"table": "vendor"
		},
		{
			"table": "qa_lab",
			"sum": "650098",
			"match": 0
		},
		{
			"table": "third_party_transporter",
			"match": 0,
			"sum": "509214383"
		},
		{
			"sum": "634349",
			"match": 0,
			"table": "employee"
		},
		{
			"match": 0,
			"sum": "317744",
			"table": "vehicle"
		},
		{
			"table": "inventory_room",
			"match": 0,
			"sum": "651467"
		},
		{
			"match": 0,
			"sum": "651465",
			"table": "plant_room"
		},
		{
			"table": "inventory",
			"match": 0,
			"sum": "651463"
		},
		{
			"table": "plant",
			"sum": "3906996",
			"match": 0
		},
		{
			"table": "plant_derivative",
			"match": 0,
			"sum": "651166"
		},
		{
			"table": "manifest",
			"sum": "640581",
			"match": 0
		},
		{
			"sum": "650952",
			"match": 0,
			"table": "inventory_transfer"
		},
		{
			"sum": "62002",
			"match": 0,
			"table": "inventory_transfer_inbound"
		},
		{
			"match": 0,
			"sum": "647384",
			"table": "inventory_sample"
		},
		{
			"table": "inventory_qa_sample",
			"match": 0,
			"sum": "613998"
		},
		{
			"match": 0,
			"sum": "650645",
			"table": "inventory_adjust"
		},
		{
			"table": "tax_report",
			"match": 0,
			"sum": "296942"
		}
	],
	"success": 1
}
*/

// 2% of the time fail
//if ($rnd <= 2) {
//
//	return $RES->withJSON(array(
//		'success' => 0,
//		'error' => 'Your session has expired.',
//		'errorcode' => 63,
//	));
//
//}
