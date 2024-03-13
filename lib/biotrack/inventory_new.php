<?php
/**
*/

return $RES->withJSON(array(
	'success' => 1,
	'barcode_id' => _rnd_barcode(),
	'transactionid' => _rnd_transaction_id(),
	'sessiontime' => $_SERVER['REQUEST_TIME'],
));

return $RES->withJSON(array(
	'success' => 0,
	'error' => 'You did not provide any data to update.',
	'errorcode' => 602,
));

//inventory_new
//case 'inventory_new':
//	$ret = array(
//		'success' => 1,
//		'sessiontime' => $_SERVER['REQUEST_TIME'],
//		'transactionid' => _rnd_transaction_id(),
//		'barcode_id' => array(
//			_rnd_barcode(),
//			_rnd_barcode(),
//		),
//	);
//	die(json_encode($ret));
//	break;
//