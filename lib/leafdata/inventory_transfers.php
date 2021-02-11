<?php
/**
 * Generate Fake Transfers for LeafData
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
				'global_id' => sprintf('LDTEST1.IT%s', $oid),
				'created_at' => date('m/d/Y g:ia'),
				"deleted_at" => null,
				"updated_at" => date('m/d/Y g:ia'),
				"hold_starts_at" => date('m/d/Y g:ia'),
				"number_of_edits" => null,
				"hold_ends_at" => date('m/d/Y g:ia'),
				"external_id" => "",
				"void" => 0,
				"transferred_at" => date('m/d/Y g:ia'),
				"est_departed_at" => date('m/d/Y g:ia'),
				"est_arrival_at" => date('m/d/Y g:ia'),
				"multi_stop" => 0,
				"route" => "",
				"stops" => "",
				"vehicle_description" => "Chevrolet/CamaroSS",
				"vehicle_year" => null,
				"vehicle_color" => null,
				"vehicle_vin" => "1Z2Y3X4W5V6U7T8S",
				"vehicle_license_plate" => "ND4SPD",
				"notes" => "",
				"transfer_manifest" => null,
				"manifest_type" => "delivery",
				"status" => "in-transit",
				"type" => "inventory",
				"deleted_at" => null,
				"transfer_type" => "transfer",
				"global_id" => "WAG010101.ITBY",
				"test_for_terpenes" => 0,
				"transporter_name1" => "Mary Jane Doe",
				"transporter_name2" => "",
				"global_mme_id" => "WASTATE1.MM18",
				"global_user_id" => "WASTATE1.US5",
				"global_from_mme_id" => "WASTATE1.MM18",
				"global_to_mme_id" => "WASTATE1.MM1T",
				"global_from_user_id" => "WASTATE1.US5",
				"global_to_user_id" => null,
				"global_from_customer_id" => null,
				"global_to_customer_id" => null,
				"global_transporter_user_id" => null,
				"global_transporting_mme_id" => null,
			);

		}

		return $RES->withJSON($ret);

	case 'POST':

		$ret = array(
			"inventory_transfer" => array(
				"manifest_type" => "delivery",
				"multi_stop" => 0,
				"external_id" => "12345",
				"est_departed_at" => date('m/d/Y g:ia'),
				"est_arrival_at" => date('m/d/Y g:ia'),
				"vehicle_description" => "blue mini van",
				"vehicle_license_plate" => "RTE123",
				"vehicle_vin" => "J1234567890",
				"global_to_mme_id" => "WASTATE1.MM24M",
				"transporter_name1" => "John",
				"transporter_name2" => "",
				"inventory_transfer_items" => array(
					"external_id" => "",
					"is_sample" => 1,
					"sample_type" => "product_sample",
					"product_sample_type" => "budtender_sample",
					"retest" => 0,
					"qty" => 1.00,
					"uom" => "gm",
					"global_inventory_id" => "WAG010101.INZFC"
				)
			)
		);

		return $RES->withJSON($ret);


	case 'DELETE':
		return $RES->write("");
		break;
}
