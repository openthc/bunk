<?php
/**
*/

use \OpenTHC\Bunk\BioTrack\Base;

$ret = array(
	'data' => array(),
	'success' => 1,
);
foreach ($json['barcodeid'] as $b) {
	$ret['data'][] = array(
		'barcode_id' => $b,
		'invtype' => _rnd_inventory_type(),
		'quantity' => mt_rand(1,9),
		'usableweight' => (mt_rand(100,999) / 100),
		'strain' => _rnd_product_name(),
		'product' => 'Test Product',
	);
}

return $RES->withJSON($ret);
