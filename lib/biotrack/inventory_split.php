<?php
/**

*/

//$q = $json['




return $RES->withJSON(array(
	'success' => 1,
	'barcode_id' => _rnd_barcode(),
	'transactionid' => _rnd_transaction_id(),
	'sessiontime' => $_SERVER['REQUEST_TIME'],
));

//inventory_split
//case 'inventory_split':
//	$res = array(
//		'barcode_id' => array(_rnd_barcode(), _rnd_barcode()),
//		'sessiontime' => $time,
//		'success' => '1',
//		'transactionid' => '3311',
//	);
//	die(json_encode($res));
//	break;
//
//