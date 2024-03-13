<?php
/**
*/

//return $RES->withJSON(array(
//	'success' => 0,
//	'error' => 'The departure time for stop number 1 is less than 24 hours from the current time and will need to be corrected.',
//	'errorcode' => 268,
//));
//// The departure time for stop number 2 is less than 24 hours from the current time and will need to be corrected.
//
//return $RES->withJSON(array(
//	'success' => 0,
//	'error' => 'Your manifest includes a mix of sale items and refund items and you must file these as separate manifests.',
//	'errorcode' => 268,
//));
//
//return $RES->withJSON(array(
//	'success' => 0,
//	'error' => 'Please specify at least one item to transfer.',
//	'errorcode' => 602,
//));
//
//return $RES->withJSON(array(
//	'success' => 0,
//	'error' => 'Barcode 6032983430004333 has already been scheduled for transfer in a previous manifest that has not been completed yet.',
//	'errorcode' => 602,
//));
/*
{"error":"The item 4154590000000021 has not been fully QA tested and cannot be transferred until that has been completed.","success":0,"errorcode":"202"}
*/


return $RES->withJSON(array(
	'success' => 1,
	'barcode_id' => _rnd_barcode(),
	'transactionid' => _rnd_transaction_id(),
	'sessiontime' => $_SERVER['REQUEST_TIME'],
));
