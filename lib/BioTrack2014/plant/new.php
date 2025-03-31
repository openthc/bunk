<?php
/**

*/

$ret = array(
	'success' => 1,
	'sessiontime' => $_SERVER['REQUEST_TIME'],
	'transactionid' => _rnd_transaction_id(),
	'barcode_id' => array(),
);

if (empty($json['location'])) {
}

if (empty($json['source'])) {
}

if (empty($json['room'])) {
	return $RES->withJSON(array(
		'success' => 0,
		'error' => 'You did not specify a valid room for the new plant(s).',
		'errorcode' => 200,
	));
}

$idx = 0;
$max = intval($json['quantity']);
$max = max(1, $max);

for ($idx=0; $idx<$max; $idx++) {
	$ret['barcode_id'][] = _rnd_barcode();
}

return $RES->withJSON($ret);
