<?php
/**
 * Generate Fake Inventories for LeafData
 */

use OpenTHC\Bunk\Module\LeafData;

switch ($_SERVER['REQUEST_METHOD']) {
	case 'GET':

		$min = mt_rand(1000, 9999);
		$max = 10;

		$ret = array(
			'total' => $max,
			'per_page' => 2500, // always
			'current_page' => 1,
			'last_page' => 1,
			'next_page_url' => null,
			'prev_page_url' => null,
			'from' => 1,
			'to' => $max,
			'data' => array(),
		);

		for ($idx = 0; $idx < $max; $idx++) {

			$oid = LeafData::generateId($min + $idx);

			$ret['data'][] = array(
				'global_id' => sprintf('LDTEST1.IN%s', $oid),
				'created_at' => date('m/d/Y g:ia'),
				"deleted_at" => null,
				"updated_at" => date('m/d/Y g:ia'),
			);

		}

		return $RES->withJSON($ret);

	case 'POST':
	case 'DELETE':

}
