<?php
/**
	Inventory Manifest Lookup
*/

/*
return $RES->withJSON(array(
	'success' => 0,
	'error' => 'The current session does not possess access to the inventory_manifest_lookup privilege.',
	'errorcode' => 62,
));

return $RES->withJSON(array(
	'success' => 0,
	'error' => 'Your session has expired.',
	'errorcode' => 63,
));

return $RES->withJSON(array(
	'success' => 0,
	'error' => 'No inbound transfers or pending manifests found.',
	'errorcode' => 602,
));


return $RES->withJSON(array(
	'success' => 0,
	'error' => sprintf('No inbound transfers found. However, there was %d pending manifest that have yet to be shipped. If you are expecting one of these to be available, please contact the vendor and inform them that they must complete the transfer before it can be accepted inbound.', rand(1, 5)),
	'errorcode' => 602,
));

return $RES->withJSON(array(
	'success' => 0,
	'error' => 'Please specify a valid license number.',
	'errorcode' => 602,
));
*/

//	if (!preg_match('/^\d{9}$/', $json['location'])) {
//		_fail('Invalid Location');
//	}
//
$ret = array(
	'success' => 1,
	'sessiontime' => $_SERVER['REQUEST_TIME'],
	'data' => array(),
);

$max = mt_rand(1,9);
for ($idx=0;$idx<$max;$idx++) {
	$ret['data'][] = array(
		'item_count' => mt_rand(1,9),
		'license_number' => substr(_rnd_license(), -6),
		'manifest_id' => _rnd_barcode(),
		'trade_name' => sprintf('Test Vendor %d', mt_rand(1,9)),
		'transfer_date' => strftime('%m/%d/%Y', $time - 86400),
	);
}
// die(json_encode(array('barcode_id' => array(6853296789574115, 6853296789574116), 'success' => '1', 'transactionid' => '3311', 'sessiontime' => $time)));

return $RES->withJSON($ret);

/*

	if (!preg_match('/^\d{9}$/', $json['location'])) {
		_fail('Invalid Location');
	}
	if (!preg_match('/^\w{16}$/', $json['manifest_id'])) {
		_fail('Invalid Manifest');
	}

	$max = mt_rand(1,9);
	$ret = array(
		'data' => array(),
		'success' => 1,
		'sessiontime' => $time,
	);
	for ($idx=0;$idx<$max;$idx++) {
		$ret['data'][] = array(
			'barcode_id' => _rnd_barcode(),
			'product' => sprintf('Test %s %d', _rnd_product_name(), mt_rand(1,9)),
			'quantity' => mt_rand(1,9),
			'inventorytype' => _rnd_inventory_type(),
			'description' => 'Test Inventory Item',
		);
	}
	die(json_encode($ret));
*/
