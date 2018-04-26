<?php
/**
*/

return $RES->withJSON(array(
	'success' => 0,
	'error' => 'You cannot create flower lots greater than 15 pounds.',
	'errorcode' => 202,
));

$ret = array(
	'success' => '1',
	'transactionid' => '33778',
	'sessiontime' => $time,
	"barcode_id" => _rnd_barcode(),
	"barcode_type" => 13,
);

return $RES->withJSON($ret);
