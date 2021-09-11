<?php
/**
 * inventory_qa_sample_non_mandatory
 */

use \OpenTHC\Bunk\BioTrack\Base;

return $RES->withJSON(array(
	'success' => 1,
	'sessiontime' => $_SERVER['REQUEST_TIME'],
	'transactionid' => Base::_rnd_transaction_id(),
	'sample_id' => Base::_rnd_barcode(),
));
