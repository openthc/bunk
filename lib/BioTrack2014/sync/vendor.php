<?php
/**
 * Sync Vendor
 *
 * SPDX-License-Identifier: MIT
 */

use \OpenTHC\Bunk\BioTrack\Base;


$ret = array(
	'success' => 1,
	'vendor' => array(),
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
	'transactionid' => 991111,
	'transactionid_original' => 911111,
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
	'transactionid' => 991111,
	'transactionid_original' => 911111,
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
	'transactionid' => 991111,
	'transactionid_original' => 911111,
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
	'transactionid' => 991111,
	'transactionid_original' => 911111,
);

$ret['vendor'][] = array(
	'ubi' => '999000007',
	'location' => '990007',
	'name' => 'Bunk Producer/Processor',
	'locationtype' => 5,
	'address1' => '777 FAKE ST',
	'address2' => 'STE 7',
	'city' => 'Oakland',
	'state' => 'CA',
	'zip' => '94601',
	'processor' => 1,
	'producer' => 1,
	'retail' => 0,
	'deleted' => 0,
	'medical' => 0,
	'transactionid' => 991111,
	'transactionid_original' => 911111,
);

$ret['vendor'][] = array(
	'ubi' => '999000008',
	'location' => '990008',
	'name' => 'Bunk Producer/Processor',
	'locationtype' => 5,
	'address1' => '888 FAKE ST',
	'address2' => 'STE 8',
	'city' => 'Oakland',
	'state' => 'CA',
	'zip' => '94601',
	'processor' => 1,
	'producer' => 1,
	'retail' => 0,
	'deleted' => 0,
	'medical' => 0,
	'transactionid' => 991111,
	'transactionid_original' => 911111,
);

$ret['vendor'][] = array(
	'ubi' => '999000009',
	'location' => '990009',
	'name' => 'Bunk Producer/Processor',
	'locationtype' => 5,
	'address1' => '999 FAKE ST',
	'address2' => 'STE 9',
	'city' => 'Oakland',
	'state' => 'CA',
	'zip' => '94601',
	'processor' => 1,
	'producer' => 1,
	'retail' => 0,
	'deleted' => 0,
	'medical' => 0,
	'transactionid' => 991111,
	'transactionid_original' => 911111,
);

return $RES->withJSON($ret, 200, JSON_PRETTY_PRINT);
