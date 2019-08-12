<?php
/**
	Sync Vendor
*/

$ret = array(
	'success' => 1,
	'vendor' => array(),
);

//foreach ($res_license as $rec) {
//
//	$addr = $meta['address1'];
//	if (false === strpos($addr, $meta['address2'])) {
//		$addr.= ' ' . $meta['address2'];
//		$meta['address2'] = null;
//	}
//
//	if (empty($meta['locationtype'])) {
//		$meta['locationtype'] = 1;
//		$meta['producer'] = 1;
//	}

$ret['vendor'][] = array(
	'ubi' => '999000001',
	'location' => '990001',
	'name' => 'Mock Grower',
	'locationtype' => 1,
	'address1' => '111 FAKE ST   STE 1',
	'address2' => 'STE 1',
	'city' => 'Oakland',
	'state' => 'CA',
	'zip' => '94601',
	'processor' => 0,
	'producer' => 1,
	'retail' => 0,
	'deleted' => 0,
	'medical' => 0,
	'transactionid' => _rnd_transaction_id(),
	'transactionid_original' => 911111,
);

$ret['vendor'][] = array(
	'ubi' => '999000002',
	'location' => '990002',
	'name' => 'Bunk Producer/Processor',
	'locationtype' => 2,
	'address1' => '123 FAKE ST   STE 2',
	'address2' => 'STE 2',
	'city' => 'Oakland',
	'state' => 'CA',
	'zip' => '94601',
	'processor' => 1,
	'producer' => 1,
	'retail' => 0,
	'deleted' => 0,
	'medical' => 0,
	'transactionid' => _rnd_transaction_id(),
	'transactionid_original' => 922222,
);

$ret['vendor'][] = array(
	'ubi' => '999000003',
	'location' => '990003',
	'name' => 'Bunk Producer/Processor',
	'locationtype' => 3,
	'address1' => '333 FAKE ST',
	'address2' => 'STE 3',
	'city' => 'Oakland',
	'state' => 'CA',
	'zip' => '94601',
	'processor' => 1,
	'producer' => 1,
	'retail' => 0,
	'deleted' => 0,
	'medical' => 0,
	'transactionid' => _rnd_transaction_id(),
	'transactionid_original' => 933333,
);

$ret['vendor'][] = array(
	'ubi' => '999000004',
	'location' => '990004',
	'name' => 'Bunk Producer/Processor',
	'locationtype' => 4,
	'address1' => '444 FAKE ST',
	'address2' => 'STE 4',
	'city' => 'Oakland',
	'state' => 'CA',
	'zip' => '94601',
	'processor' => 1,
	'producer' => 1,
	'retail' => 0,
	'deleted' => 0,
	'medical' => 0,
	'transactionid' => _rnd_transaction_id(),
	'transactionid_original' => 944444,
);

$ret['vendor'][] = array(
	'ubi' => '999000005',
	'location' => '990005',
	'name' => 'Bunk Producer/Processor',
	'locationtype' => 4,
	'address1' => '555 FAKE ST',
	'address2' => 'STE 5',
	'city' => 'Oakland',
	'state' => 'CA',
	'zip' => '94601',
	'processor' => 1,
	'producer' => 1,
	'retail' => 0,
	'deleted' => 0,
	'medical' => 0,
	'transactionid' => _rnd_transaction_id(),
	'transactionid_original' => 955555,
);

$ret['vendor'][] = array(
	'ubi' => '999000006',
	'location' => '990006',
	'name' => 'Bunk Producer/Processor',
	'locationtype' => 4,
	'address1' => '666 FAKE ST',
	'address2' => 'STE 6',
	'city' => 'Oakland',
	'state' => 'CA',
	'zip' => '94601',
	'processor' => 1,
	'producer' => 1,
	'retail' => 0,
	'deleted' => 0,
	'medical' => 0,
	'transactionid' => _rnd_transaction_id(),
	'transactionid_original' => 966666,
);

$ret['vendor'][] = array(
	'ubi' => '999999999',
	'location' => '999999',
	'name' => 'Mock Test Company',
	'locationtype' => 1,
	'address1' => '999 FAKE ST',
	'address2' => 'STE 9',
	'city' => 'Oakland',
	'state' => 'CA',
	'zip' => '94601',
	'processor' => 1,
	'producer' => 1,
	'retail' => 1,
	'deleted' => 0,
	'medical' => 1,
	'transactionid' => _rnd_transaction_id(),
	'transactionid_original' => 999999,
);


return $RES->withJSON($ret, 200, JSON_PRETTY_PRINT);
