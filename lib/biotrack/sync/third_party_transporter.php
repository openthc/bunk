<?php
/**
	Generate Bunk Third Party Transport
*/


$t0 = array(
	'ubi' => '999222001',
	'location' => '992201',
	'license_number' => '992201',
	'name' => 'Mock Transport A',
	'processor' => 0,
	'producer' => 0,
	'retail' => 0,
	'deleted' => 0,
	'medical' => 0,
	'transactionid' => _rnd_transaction_id(),
	'transactionid_original' => _rnd_transaction_id(),
);

$ret = array(
	'success' => 1,
	'third_party_transporter' => array(),
);

$ret['third_party_transporter'][] = $t0;

return $RES->withJSON($ret);
