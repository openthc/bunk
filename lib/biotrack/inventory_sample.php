<?php
/**

*/

$bc = _rnd_barcode();

return $RES->withJSON(array(
	'success' => 1,
	'sessiontime' => $_SERVER['REQUEST_TIME'],
	'transactionid' => _rnd_transaction_id(),
	'barcode_id' => $bc,
));
