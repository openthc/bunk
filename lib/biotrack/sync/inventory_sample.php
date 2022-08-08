<?php
/**
 * Bunk Inventory Sample
 *
 * SPDX-License-Identifier: MIT
 */

use \OpenTHC\Bunk\BioTrack\Base;

$ret = [];
$ret['success'] = 1;
$ret['inventory_sample'] = [];

$max = rand(2,10);
$txn = Base::_rnd_transaction_id();

for ($idx=0; $idx<$max; $idx++) {
	$ret['inventory_sample'][] = array(
		"inventoryid" => Base::_rnd_barcode(),
		"vendor_license" => "123456",
		"location" => "999999",
		"quantity" => "1.00",
		"sample_type" => "1",
		"sessiontime" => $time,
		"transactionid" => $txn,
		"transactionid_original" => $txn,
	);
}

return $RES->withJSON($ret);
