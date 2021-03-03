<?php
/**
 * Generate Fake Disposals for LeafData
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
				'global_id' => sprintf('LDTEST1.DI%s', $oid),
				'created_at' => date('m/d/Y g:ia'),
				"deleted_at" => null,
				"updated_at" => date('m/d/Y g:ia'),
				"hold_starts_at" => date('m/d/Y g:ia'),
				"hold_ends_at" => date('m/d/Y g:ia'),
				"external_id" => "",
				"whole_plant" => null,
				"reason" => "quality control",
				"method" => "",
				"disposal_at" => date('m/d/Y g:ia'),
				"phase" => "",
				"type" => null,
				"qty" => "200.0000",
				"uom" => "gm",
				"source" => "inventory",
				"disposal_cert" => null,
				"deleted_at" => null,
				"global_id" => "WAG010101.DI9",
				"batch_type" => "",
				"global_mme_id" => "WAWA1.MM1LS",
			);

		}

		return $RES->withJSON($ret);

	case 'POST':

		$pct = rand(1,100);


		switch ($ret_code) {
			case 200:
				$ret = [];
				$ret[] = [
					'source' => 'daily_plant_waste',
					'reason' => 'daily_waste',
					'qty' => '3018',
					'uom' => 'gm',
					'hold_starts_at' => '01/22/2021 09:33am',
					'hold_ends_at' => '01/25/2021 09:33am',
					'updated_at' => '01/22/2021 09:33am',
					'created_at' => '01/22/2021 09:33am',
					'global_id' => 'WAJ413091.DI8R3EI',
					'global_mme_id' => 'WAWA1.MMSC',
					'global_user_id' => 'WAWA1.US3PF',
					'global_batch_id' => 'WAJ413002.BAD4SOO',
					'global_area_id' => 'WAJ413091.AR4I0I',
					'global_plant_id' => null,
					'global_inventory_id' => 'WAJ413091.INT9CT'
				];
				_exit_json($ret);
				break;
			case 422:
				_exit_json([
					'error' => true,
					'error_message' => '',
					'validation_messages' => [
						'inventory_id' => [
							'Waste is required to be disposed of using the dispose_item call.'
						]
					]
				], $ret_code);
				break;
		}

		$ret = [];



	case 'DELETE':

}
