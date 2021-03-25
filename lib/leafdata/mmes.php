<?php
/**
 * Generate Fake MMEs for LeafData
 */

use OpenTHC\Bunk\Module\LeafData;

switch ($_SERVER['REQUEST_METHOD']) {
	case 'GET':

		$min = mt_rand(1000, 9999);
		$max = 10;

		for ($idx = 0; $idx < $max; $idx++) {

			$oid = LeafData::generateId($min + $idx);

			$ret['data'][] = array(
				'global_id' => sprintf('LDTEST1.MA%s', $oid),
				'created_at' => "02\/01\/2018 03:00pm",
				"deleted_at" => null,
				"updated_at" => "02\/01\/2018 03:00pm",
			);

		}

		return $RES->withJSON($ret);

	case 'POST':
	case 'DELETE':

		return $RES->withJSON([
			'error' => true,
			'error_message' => 'OpenTHC Bunk Error',
		], 500);

}
