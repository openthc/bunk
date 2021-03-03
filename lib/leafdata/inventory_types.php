<?php
/**
 * Generate Fake Inventory Types for LeafData
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
				'global_id' => sprintf('LDTEST1.TY%s', $oid),
				"created_at" => date('m/d/Y g:ia'),
				"updated_at" => date('m/d/Y g:ia'),
				"external_id" => 12345,
				"name" => "Charlotte's Web Eighths",
				"description" => "",
				"storage_instructions" => "",
				"ingredients" => "",
				"type" => "end_product",
				"allergens" => "",
				"contains" => "",
				"used_butane" => 0,
				"net_weight" => null,
				"packed_qty" => null,
				"cost" => 0.00,
				"value" => 0.00,
				"serving_num" => 1,
				"serving_size" => 0,
				"weight_per_unit_in_mcg" => null,
				"weight_per_unit_in_grams" => 4,
				"uom" => "ea",
				"total_marijuana_in_grams" => 0.000000,
				"total_marijuana_in_mcg" => null,
				"deleted_at" => null,
				"intermediate_type" => "usable_marijuana",
				"global_id" => "WAG010101.TYA1Y",
				"global_original_id" => null,
				"global_mme_id" => "WASTATE1.MM18",
				"global_user_id" => "WASTATE1.US5",
				"global_strain_id" => null
			);

		}

		return $RES->withJSON($ret);
	
	case 'POST':

		$ret = array(
			"external_id" => 12345,
			"name" => "Charlotte's Web Eighths",
			"type" => "end_product",
			"intermediate_type" => "usable_marijuana",
			"weight_per_unit_in_grams" => "3.5",
			"uom" => "ea",
			"updated_at" => date('m/d/Y g:ia'),
			"created_at" => date('m/d/Y g:ia'),
			"global_id" => "WAG010101.TYA1Y",
			"global_mme_id" => "WASTATE1.MM18",
			"global_user_id" => "WASTATE1.US5",
			"global_strain_id" => null
		);

		return $RES->withJSON($ret);

	break;
}
