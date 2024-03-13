<?php
/**
*/


$bc = _rnd_barcode();

return $RES->withJSON(array(
	'success' => 1,
	'sessiontime' => $_SERVER['REQUEST_TIME'],
	'barcode_id' => $bc,
	'transactionid' => _rnd_transaction_id(),
	'derivatives' => array(
		'barcode_id' => $bc,
		'barcode_type' => 28,
	),
));

//return $RES->withJSON(array(
//	'success' => 0,
//	'error' => 'A derivative amount greater than the deduction amount was entered.',
//	'errorcode' => 202,
//));
//
//return $RES->withJSON(array(
//	'success' => 0,
//	'error' => 'You cannot convert from Hydrocarbon Wax into Usable Marijuana.',
//	'errorcode' => 202,
//));
//// You cannot convert from Flower Lot into Marijuana Mix Packaged.
//// You cannot convert from Marijuana Mix into Usable Marijuana.
//// You cannot convert from Flower Lot into Marijuana Extract for Inhalation.
//// You cannot convert from Marijuana Mix into Marijuana Extract for Inhalation.
//// You cannot convert from CO2 Hash Oil into Usable Marijuana.
//// You cannot convert from Kief into Kief.
//
//return $RES->withJSON(array(
//	'success' => 0,
//	'error' => 'The usable amount specified is greater than an ounce.',
//	'errorcode' => 202,
//));

//inventory_convert
//case 'inventory_convert':
//	/*
//	  die('{
//	  "derivatives": [
//	  {
//	  "barcode_id": "0358560579655606",
//	  "barcode_type": "18"
//	  },
//	  {
//	  "barcode_id": "0358560579655605",
//	  "barcode_type": "27"
//	  }
//	  ]
//	  }');
//	 */
//	$result = array(
//		'derivatives' => array(
//			array("barcode_id" => _rnd_barcode(), "barcode_type" => 18),
//			array("barcode_id" => _rnd_barcode(), "barcode_type" => 27),
//		),
//		'success' => '1',
//		'transactionid' => '3311',
//		'sessiontime' => $time
//	);
//	die(json_encode($result));
//	break;
//