<?php
/**
 * SPDX-License-Identifier: MIT
 */

use \OpenTHC\Bunk\BioTrack\Base;

// return $RES->withJSON(array(
// 	'success' => 0,
// 	'error' => 'You cannot create flower lots greater than 15 pounds.',
// 	'errorcode' => 202,
// ));

$ret = array(
	'success' => '1',
	'transactionid' => Base::_rnd_transaction_id(),
	'sessiontime' => $time,
	"barcode_id" => Base::_rnd_barcode(),
	"barcode_type" => 13,
);

return $RES->withJSON($ret);
