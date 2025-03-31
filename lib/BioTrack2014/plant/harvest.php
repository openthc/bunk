<?php
/**
	6 becomes 29 if 'wet' was passed
	Else, 6 Becomes an Un-ID'd plant_derivative Object, Not Sent In Reply but in the DB
*/

$txn = _rnd_transaction_id();

$ret = array(
	'success' => 1,
	'sessiontime' => $_SERVER['REQUEST_TIME'],
	'transactionid' => $txn,
	'derivatives' => array(),
);

foreach ($json['weights'] as $i => $inv) {

	$inv = null;

	switch ($inv['invtype']) {
	case 6:
		if (!empty($json['wet'])) {
			$inv = array(
				'barcode_id' => _rnd_barcode(),
				'barcode_type' => 29,
			);
		} else {
			foreach ($json['barcodeid'] as $pid) {
				$arg = array('meta' => json_encode(array(
					'collectadditional' => 0,
					'curecollect' => 0,
					'deleted' => 0,
					'harvestcollect' => 1,
					'inventoryid' => null,
					'inventorytype' => 29,
					'plantid' => $pid,
					'location' => -1,
					'room' => $json['new_room'],
					'sessiontime' => $_SERVER['REQUEST_TIME'],
					'weight' => $inv['amount'] / count($json['barcodeid']),
					'wholeweight' => $inv['amount'],
					'transactionid' => $txn,
					'transactionid_original' => $txn,
				)));
				//SQL::insert('sync_plant_derivative', $arg);
			}
		}
		break;
	case 9:

		$inv = array(
			'barcode_id' => _rnd_barcode(),
			'barcode_type' => 9,
		);

		//foreach ($json['barcodeid'] as $pid) {
		$arg = array('meta' => json_encode(array(
			'collectadditional' => 0,
			'curecollect' => 0,
			'deleted' => 0,
			'harvestcollect' => 1,
			'inventoryid' => null,
			'inventorytype' => 29,
			'plantid' => explode(',', $json['barcodeid']),
			'location' => -1,
			'room' => $json['new_room'],
			'sessiontime' => $_SERVER['REQUEST_TIME'],
			'weight' => $inv['amount'] / count($json['barcodeid']),
			'wholeweight' => $inv['amount'],
			'transactionid' => $txn,
			'transactionid_original' => $txn,
		)));
		//SQL::insert('sync_plant_derivative', $arg);

		$arg = array('meta' => json_encode(array(

		)));
		//SQL::insert('sync_inventory', $arg);
		//}

		break;
	case 27:
		$inv = array(
			'barcode_id' => _rnd_barcode(),
			'barcode_type' => 27,
		);
		break;
	}

	if ($inv) {
		$ret['derivatives'][] = $inv;
	}

}

return $RES->withJSON($ret);
