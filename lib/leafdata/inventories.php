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
				"created_at" => date('m/d/Y g:ia'),
				"external_id" => "",
				"released_by_state" => null,
				"lab_retest_id" => null,
				"is_initial_inventory" => 0,
				"net_weight" => "0.00",
				"inventory_created_at" => "",
				"inventory_expires_at" => "",
				"inventory_packaged_at" => "",
				"qty" => "140.0000",
				"packed_qty" => null,
				"cost" => 0.00,
				"value" => 0.00,
				"source" => null,
				"propagation_source" => "none",
				"uom" => "gm",
				"total_marijuana_in_grams" => 0.00,
				"additives" => "",
				"serving_num" => "1",
				"serving_size" => "0",
				"marijuana_type" => null,
				"sent_for_testing" => "1",
				"deleted_at" => null,
				"last_harvest_stage" => null,
				"medically_compliant" => "0",
				"global_id" => "WAM200002.IN7DNC",
				"legacy_id" => null,
				"lab_result_file_path" => null,
				"lab_results_attested" => "0",
				"lab_results_date" => "",
				"global_original_id" => "",
				"batch_type" => "extraction",
				"global_batch_id" => "WAM200002.BAU81",
				"global_area_id" => "WAM200002.ARHE3",
				"global_lab_result_id" => "WAL400004.LRKPX",
				"global_strain_id" => "WAM200002.ST72N",
				"global_inventory_type_id" => "WAM200002.TYIGQ",
				"global_created_by_mme_id" => "",
				"global_mme_id" => "WAWA1.MM1VB",
				"global_user_id" => "WAWA1.US4",
				"high_cbd" => false,
				"high_thc" => false,
				"general_use" => false,
				"labResults" => [
					"global_id" => "WAL400004.LRKPX",
					"created_at" => date('m/d/Y g:ia')
				]
			);

		}

		return $RES->withJSON($ret);
	
	break;

	case 'POST':
		
		$ret = array(
			"external_id" => 12345,
			"is_initial_inventory" => 0,
			"is_active" => 1,
			"inventory_created_at" => date('m/d/Y g:ia'),
			"inventory_packaged_at" => date('m/d/Y g:ia'),
			"medically_compliant" => 0,
			"qty" => 1248.00,
			"uom" => "gm",
			"global_batch_id" => "WAG010101.BAH3",
			"global_area_id" => "WAG010101.AR64",
			"global_strain_id" => "WAG010101.ST4V",
			"global_inventory_type_id" => "WAG010101.ITAH",
			"legacy_id" => ""
		);

		return $RES->withJSON($ret);
		break;

	case 'DELETE':
		return $RES->write("");
		break;
}
