<?php
/**
 * Generate Fake Inventory Adjustments for LeafData
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
				'global_id' => sprintf('LDTEST1.AR%s', $oid),
				'created_at' => date('m/d/Y g:ia'),
				"deleted_at" => null,
				"updated_at" => date('m/d/Y g:ia'),
				"created_at" => date('m/d/Y g:ia'),
				"external_id" => "",
				"adjusted_at" => date('m/d/Y g:ia'),
				"qty" => 2.00,
				"uom" => "ea",
				"reason" => "transfer",
				"memo" => "",
				"global_mme_id" => "WASTATE1.MM17",
				"global_user_id" => "WASTATE1.US5",
				"global_inventory_id" => "WAL050505.IN8F",
				"global_adjusted_by_user_id" => null
			);

		}

		return $RES->withJSON($ret);
		break;

	case 'POST':

		$ret = array(
			"external_id" => "",
			"adjusted_at" => date('m/d/Y g:ia'),
			"qty" => -2.00,
			"uom" => "gm",
			"reason" => "budtender_sample",
			"memo" => "",
			"updated_at" => date('m/d/Y g:ia'),
			"created_at" => date('m/d/Y g:ia'),
			"global_id" => "WAG010101.IA1KQQ",
			"global_mme_id" => "WASTATE1.MM24L",
			"global_user_id" => "WASTATE1.US2FE",
			"global_inventory_id" => "WAG010101.INZFC",
			"global_adjusted_by_user_id" => "WASTATE1.US3"
			
		);

		return $RES->withJSON($ret);
		break;
		
	case 'DELETE':
		return $RES->write("");
		break;
}
