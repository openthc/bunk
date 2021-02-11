<?php
/**
 * Generate Fake Batches for LeafData
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
				"created_at" => date('m/d/Y g:ia'),
				"updated_at" => date('m/d/Y g:ia'),
				"external_id" => "",
				"planted_at" => "",
				"harvested_at" => "",
				"batch_created_at" => date('m/d/Y g:ia'),
				"num_plants" => "35",
				"status" => "open",
				"qty_harvest" => 0.00,
				"uom" => "ea",
				"is_parent_batch" => 0,
				"is_child_batch" => 0,
				"type" => "plant",
				"harvest_stage" => "",
				"qty_accumulated_waste" => 0.00,
				"qty_packaged_flower" => 0.00,
				"qty_packaged_by_product" => 0.00,
				"est_harvest_at" => "",
				"packaged_completed_at" => "",
				"origin" => "seed",
				"source" => "inhouse",
				"qty_cure" => 0.00,
				"plant_stage" => "growing",
				"deleted_at" => null,
				"flower_dry_weight" => 0.00,
				"waste" => 0.00,
				"other_waste" => 0.00,
				"flower_waste" => 0.00,
				"other_dry_weight" => 0.00,
				"harvested_end_at" => "",
				"flower_wet_weight" => 0.00,
				"other_wet_weight" => 0.00,
				"global_id" => LeafData::generateId($min + $idx),
				"global_mme_id" => LeafData::generateId($min + $idx),
				"global_user_id" => LeafData::generateId($min + $idx),
				"global_strain_id" => LeafData::generateId($min + $idx),
				"global_area_id" => LeafData::generateId($min + $idx),
				"global_mother_plant_id" => null,
				"global_flower_area_id" => null,
				"global_other_area_id" => null
			);

		}

		return $RES->withJSON($ret);
	break;

	case 'POST':

		$ret = array(
			"created_at" => date('m/d/Y g:ia'),
			"updated_at" => date('m/d/Y g:ia'),
			"external_id" => "",
			"planted_at" => "",
			"harvested_at" => "",
			"batch_created_at" => date('m/d/Y g:ia'),
			"num_plants" => "35",
			"status" => "open",
			"qty_harvest" => 0.00,
			"uom" => "ea",
			"is_parent_batch" => 0,
			"is_child_batch" => 0,
			"type" => "plant",
			"harvest_stage" => "",
			"qty_accumulated_waste" => 0.00,
			"qty_packaged_flower" => 0.00,
			"qty_packaged_by_product" => 0.00,
			"est_harvest_at" => "",
			"packaged_completed_at" => "",
			"origin" => "seed",
			"source" => "inhouse",
			"qty_cure" => 0.00,
			"plant_stage" => "growing",
			"deleted_at" => null,
			"flower_dry_weight" => 0.00,
			"waste" => 0.00,
			"other_waste" => 0.00,
			"flower_waste" => 0.00,
			"other_dry_weight" => 0.00,
			"harvested_end_at" => "",
			"flower_wet_weight" => 0.00,
			"other_wet_weight" => 0.00,
			"global_id" => LeafData::generateId(1),
			"global_mme_id" => LeafData::generateId(2),
			"global_user_id" => LeafData::generateId(3),
			"global_strain_id" => LeafData::generateId(4),
			"global_area_id" => LeafData::generateId(5),
			"global_mother_plant_id" => null,
			"global_flower_area_id" => null,
			"global_other_area_id" => null
		);

		return $RES->withJSON($ret);
		break;
	case 'DELETE':
		return $RES->write("");
		break;
}
