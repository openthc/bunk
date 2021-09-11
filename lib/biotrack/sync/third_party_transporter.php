<?php
/**
	Generate Bunk Third Party Transport
*/

use \OpenTHC\Bunk\BioTrack\Base;



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
	'transactionid' => Base::_rnd_transaction_id(),
	'transactionid_original' => Base::_rnd_transaction_id(),
);

$ret = array(
	'success' => 1,
	'third_party_transporter' => array(),
);

$ret['third_party_transporter'][] = $t0;

return $RES->withJSON($ret);
