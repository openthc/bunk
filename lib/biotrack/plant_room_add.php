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

return $RES->withJSON(array(
	'success' => 1,
	'transactionid' => Base::_rnd_transaction_id(),
));
