<?php
/**
 * inventory_qa_sample
 */

use \OpenTHC\Bunk\BioTrack\Base;

//return $RES->withJSON(array(
//	'success' => 0,
//	'error' => 'You attempted to QA sample an inventory type that cannot be sampled.',
//	'errorcode' => 602,
//));
//
//return $RES->withJSON(array(
//	'success' => 0,
//	'error' => 'You attempted to QA sample an inventory item that has already been successfully tested. It will need to be approved for re-testing.',
//	'errorcode' => 602,
//));

return $RES->withJSON(array(
	'success' => 1,
	'sample_id' => Base::_rnd_barcode(),
	'transactionid' => Base::_rnd_transaction_id(),
	'sessiontime' => $_SERVER['REQUEST_TIME'],
));
