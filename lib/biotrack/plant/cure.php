<?php
/**
 * SPDX-License-Identifier: MIT
 */

use \OpenTHC\Bunk\BioTrack\Base;

/*
  die('{
  "derivatives": [
  {
  "barcode_id": "0358560579655604",
  "barcode_type": "6"
  },
  {
  "barcode_id": "0358560579655605",
  "barcode_type": "9"
  }
  ],
  "sessiontime": "1384487873",
  "success": "1",
  "transactionid": "3290"
  }
  }');
 */

$ret = array(
	'success' => 1,
	'sessiontime' => $time,
	'transactionid' => Base::_rnd_transaction_id(),
	'derivatives' => array(
		array(
			"barcode_id" => "0358560579655604",
			"barcode_type" => 9
		),
		array(
			"barcode_id" => "0358560579655605",
			"barcode_type" => 27
		)
	),
);
return $RES->withJSON($ret);
