<?php
/**
 * Golden path tests for the harvest workflow
 */

namespace OpenTHC\Bunk\Test\LeafData\Plant_Collect;

class Golden_Harvest_Test extends \OpenTHC\Bunk\Test\LeafData_Test
{

	public function test_golden_harvest_plant_to_inventory()
	{

		$_ENV['leafdata-uri'] = getenv('leafdata-uri');
		// $_ENV['leafdata-license'] = getenv('leafdata-license');
		// $_ENV['leafdata-license-secret'] = getenv('leafdata-license-secret');

		$this->ghc = $this->_api([
			'license-secret' => $_ENV['leafdata-license-j-secret'],
			'license' => $_ENV['leafdata-license-j'],
		]);

		$Plant = $this->find_random_plant();
		$global_room_id = $_ENV['leafdata-license-j-zone'];

		// 1. Harvest wet material
		$request = [
			"global_area_id" 			=> $global_room_id,
			"global_flower_area_id" 	=> $global_room_id,
			"global_other_area_id" 		=> $global_room_id,
			"global_harvest_batch_id" 	=> null,

			"global_plant_ids" 	=> [
				[
					"global_plant_id" => $Plant['global_id'],
				]
			],

			"qty_harvest" 		=> "3333333.00",
			"flower_wet_weight" => "1111111.00",
			"other_wet_weight" 	=> "2222222.00",
			"uom" 				=> "gm",
			"harvested_at" 		=> date('Y-m-d'),
		];

		$response = $this->post('plants/harvest_plants', $request);

		// @todo fill in response object tests
		$Batch = $this->assertValidResponse($response, 200);

		// @todo Validate Expected Changes to the Plant's Batch
		// Note: I believe this is a Batch object. /mbw
		$ExpectedResponse_Batch = json_decode('{
			"num_plants": "1",
			"status": "open",
			"qty_harvest": "3333333.00",
			"uom": "gm",
			"is_parent_batch": "0",
			"is_child_batch": "1",
			"type": "harvest",
			"harvest_stage": "wet",
			"qty_accumulated_waste": "0.00",
			"qty_packaged_flower": "0.00",
			"qty_packaged_by_product": "0.00",
			"est_harvest_at": "",
			"packaged_completed_at": "",
			"origin": "clone",
			"source": "inhouse",
			"qty_cure": "0.00",
			"plant_stage": "harvested",
			"deleted_at": null,
			"flower_dry_weight": "0.00",
			"waste": "0.00",
			"other_waste": "0.00",
			"flower_waste": "0.00",
			"other_dry_weight": "0.00",
			"harvested_end_at": "",
			"flower_wet_weight": "1111111.00",
			"other_wet_weight": "2222222.00",
			"global_id": "WAJWPP.BA55BG",
			"global_strain_id": "WAJWPP.ST3J6J",
			"global_mother_plant_id": null,
			"global_flower_area_id": null,
			"global_other_area_id": null
		}', true);

		$this->assertEquals($ExpectedResponse_Batch['global_other_area_id'],
											 $Batch['global_other_area_id']);
		$this->assertEquals($ExpectedResponse_Batch['global_flower_area_id'],
											 $Batch['global_flower_area_id']);
		$this->assertEquals($ExpectedResponse_Batch['global_mother_plant_id'],
											 $Batch['global_mother_plant_id']);
		$this->assertEquals($ExpectedResponse_Batch['flower_wet_weight'],
											 $Batch['flower_wet_weight']);
		$this->assertEquals($ExpectedResponse_Batch['harvested_end_at'],
											 $Batch['harvested_end_at']);
		$this->assertEquals($ExpectedResponse_Batch['flower_dry_weight'],
											 $Batch['flower_dry_weight']);
		$this->assertEquals($ExpectedResponse_Batch['deleted_at'],
											 $Batch['deleted_at']);
		$this->assertEquals($ExpectedResponse_Batch['plant_stage'],
											 $Batch['plant_stage']);
		$this->assertEquals($ExpectedResponse_Batch['qty_cure'],
											 $Batch['qty_cure']);
		$this->assertEquals($ExpectedResponse_Batch['packaged_completed_at'],
											 $Batch['packaged_completed_at']);
		$this->assertEquals($ExpectedResponse_Batch['est_harvest_at'],
											 $Batch['est_harvest_at']);
		$this->assertEquals($ExpectedResponse_Batch['qty_packaged_flower'],
											 $Batch['qty_packaged_flower']);
		$this->assertEquals($ExpectedResponse_Batch['qty_accumulated_waste'],
											 $Batch['qty_accumulated_waste']);
		$this->assertEquals($ExpectedResponse_Batch['harvest_stage'],
											 $Batch['harvest_stage']);
		$this->assertEquals($ExpectedResponse_Batch['type'],
											 $Batch['type']);
		$this->assertEquals($ExpectedResponse_Batch['is_child_batch'],
											 $Batch['is_child_batch']);
		$this->assertEquals($ExpectedResponse_Batch['is_parent_batch'],
											 $Batch['is_parent_batch']);
		$this->assertEquals($ExpectedResponse_Batch['qty_harvest'],
											 $Batch['qty_harvest']);
		$this->assertEquals($ExpectedResponse_Batch['status'],
											 $Batch['status']);
		$this->assertEquals($ExpectedResponse_Batch['num_plants'],
											 $Batch['num_plants']);

		$global_batch_id = $Batch['global_id'];

		// 2. Add cure weight
		$request = [
			"global_batch_id" 		=> $Batch['global_id'],
			"global_flower_area_id"	=> "WAJWPP.AR2U7P",
			"flower_dry_weight" 	=> "33333.00",
			"flower_waste" 			=> "44444.00",
			"global_other_area_id" 	=> "WAJWPP.AR2U7P",
			"other_dry_weight" 		=> "55555.00",
			"other_waste" 			=> "66666.00"
		];

		$response = $this->post('batches/cure_lot', $request);
		$CureBatch = $this->assertValidResponse($response, 200);

		// @todo Validated Expected changes to the Plant's Batch
		$ExpectedResponse_CureBatch = json_decode('{
			"num_plants": "1",
			"status": "open",
			"qty_harvest": "3333333.00",
			"uom": "gm",
			"is_parent_batch": "0",
			"is_child_batch": "1",
			"type": "harvest",
			"harvest_stage": "cure",
			"qty_accumulated_waste": "0.00",
			"qty_packaged_flower": "0.00",
			"qty_packaged_by_product": "0.00",
			"est_harvest_at": "",
			"packaged_completed_at": "",
			"origin": "clone",
			"source": "inhouse",
			"qty_cure": "88888.00",
			"plant_stage": "harvested",
			"deleted_at": null,
			"flower_dry_weight": "33333.00",
			"waste": "111110.00",
			"other_waste": "66666.00",
			"flower_waste": "44444.00",
			"other_dry_weight": "55555.00",
			"harvested_end_at": "",
			"flower_wet_weight": "1111111.00",
			"other_wet_weight": "2222222.00",
			"global_area_id": "WAJWPP.AR2U7P",
			"global_mother_plant_id": null,
			"global_flower_area_id": "WAJWPP.AR2U7P",
			"global_other_area_id": "WAJWPP.AR2U7P"
		}', true);

		$this->assertTrue($ExpectedResponse_CureBatch['num_plants'],
										   $CureBatch['num_plants']);
		$this->assertTrue($ExpectedResponse_CureBatch['status'],
										   $CureBatch['status']);
		$this->assertTrue($ExpectedResponse_CureBatch['qty_harvest'],
										   $CureBatch['qty_harvest']);
		$this->assertTrue($ExpectedResponse_CureBatch['uom'],
										   $CureBatch['uom']);
		$this->assertTrue($ExpectedResponse_CureBatch['is_parent_batch'],
										   $CureBatch['is_parent_batch']);
		$this->assertTrue($ExpectedResponse_CureBatch['is_child_batch'],
										   $CureBatch['is_child_batch']);
		$this->assertTrue($ExpectedResponse_CureBatch['type'],
										   $CureBatch['type']);
		$this->assertTrue($ExpectedResponse_CureBatch['harvest_stage'],
										   $CureBatch['harvest_stage']);
		$this->assertTrue($ExpectedResponse_CureBatch['qty_accumulated_waste'],
										   $CureBatch['qty_accumulated_waste']);
		$this->assertTrue($ExpectedResponse_CureBatch['qty_packaged_flower'],
										   $CureBatch['qty_packaged_flower']);
		$this->assertTrue($ExpectedResponse_CureBatch['qty_packaged_by_product'],
										   $CureBatch['qty_packaged_by_product']);
		$this->assertTrue($ExpectedResponse_CureBatch['est_harvest_at'],
										   $CureBatch['est_harvest_at']);
		$this->assertTrue($ExpectedResponse_CureBatch['packaged_completed_at'],
										   $CureBatch['packaged_completed_at']);
		$this->assertTrue($ExpectedResponse_CureBatch['qty_cure'],
										   $CureBatch['qty_cure']);
		$this->assertTrue($ExpectedResponse_CureBatch['plant_stage'],
										   $CureBatch['plant_stage']);
		$this->assertTrue($ExpectedResponse_CureBatch['deleted_at'],
										   $CureBatch['deleted_at']);
		$this->assertTrue($ExpectedResponse_CureBatch['flower_dry_weight'],
										   $CureBatch['flower_dry_weight']);
		$this->assertTrue($ExpectedResponse_CureBatch['harvested_end_at'],
										   $CureBatch['harvested_end_at']);
		$this->assertTrue($ExpectedResponse_CureBatch['flower_wet_weight'],
										   $CureBatch['flower_wet_weight']);
		$this->assertTrue($ExpectedResponse_CureBatch['global_area_id'],
										   $CureBatch['global_area_id']);
		$this->assertTrue($ExpectedResponse_CureBatch['global_mother_plant_id'],
										   $CureBatch['global_mother_plant_id']);
		$this->assertTrue($ExpectedResponse_CureBatch['global_flower_area_id'],
										   $CureBatch['global_flower_area_id']);
		$this->assertTrue($ExpectedResponse_CureBatch['global_other_area_id'],
										   $CureBatch['global_other_area_id']);

		// 3. Finish harvesting
		$request = [
			"global_batch_id" => $CureBatch['global_id'],
			"new_lot_types" => [
				[
					"global_inventory_type_id" 	=> "WAJWPP.TY5775",
					"global_area_id" 			=> "WAJWPP.AR2U7R",
					"material_type" 			=> "flower",
					"medically_compliant" 		=> "0",
					"qty" 						=> "33333"
				],
			],
		];

		$response = $this->post('batches/finish_lot', $request);
		$Inventory = $this->assertValidResponse($response, 200);

		// @todo Validate Expected Inventory
		$ExpectedResponse_Inventory = json_decode('[
			{
				"released_by_state": null,
				"lab_retest_id": null,
				"is_initial_inventory": "0",
				"net_weight": "0.00",
				"qty": "33333.0000",
				"packed_qty": null,
				"cost": "0.00",
				"value": "0.00",
				"source": "inhouse",
				"uom": "gm",
				"total_marijuana_in_grams": "0.00",
				"additives": "",
				"serving_num": "1",
				"serving_size": "0",
				"marijuana_type": "flower",
				"sent_for_testing": "0",
				"deleted_at": null,
				"last_harvest_stage": "cure",
				"medically_compliant": "0",
				"legacy_id": null,
				"lab_result_file_path": null,
				"lab_results_attested": "0",
				"lab_results_date": "",
				"global_original_id": null,
				"propagation_source": "none",
				"retail_to_medical": null,
				"global_batch_id": "WAJWPP.BA55BG",
				"global_area_id": "WAJWPP.AR2U7R",
				"global_lab_result_id": null,
				"global_strain_id": "WAJWPP.ST3J6J",
				"global_inventory_type_id": "WAJWPP.TY5775",
				"global_created_by_mme_id": null,
				"area_name": "Gamma Zone",
				"inventory_type_name": "Flower",
				"batch_type": "harvest"
			}
		]', true);
		$ExpectedResponse_Inventory = array_shift($ExpectedResponse_Inventory);

		$this->assertTrue($ExpectedResponse_Inventory['released_by_state'],
										   $Inventory['released_by_state']);
		$this->assertTrue($ExpectedResponse_Inventory['lab_retest_id'],
										   $Inventory['lab_retest_id']);
		$this->assertTrue($ExpectedResponse_Inventory['is_initial_inventory'],
										   $Inventory['is_initial_inventory']);
		$this->assertTrue($ExpectedResponse_Inventory['net_weight'],
										   $Inventory['net_weight']);
		$this->assertTrue($ExpectedResponse_Inventory['qty'],
										   $Inventory['qty']);
		$this->assertTrue($ExpectedResponse_Inventory['packed_qty'],
										   $Inventory['packed_qty']);
		$this->assertTrue($ExpectedResponse_Inventory['cost'],
										   $Inventory['cost']);
		$this->assertTrue($ExpectedResponse_Inventory['value'],
										   $Inventory['value']);
		$this->assertTrue($ExpectedResponse_Inventory['uom'],
										   $Inventory['uom']);
		$this->assertTrue($ExpectedResponse_Inventory['total_marijuana_in_grams'],
										   $Inventory['total_marijuana_in_grams']);
		$this->assertTrue($ExpectedResponse_Inventory['additives'],
										   $Inventory['additives']);
		$this->assertTrue($ExpectedResponse_Inventory['serving_num'],
										   $Inventory['serving_num']);
		$this->assertTrue($ExpectedResponse_Inventory['serving_size'],
										   $Inventory['serving_size']);
		$this->assertTrue($ExpectedResponse_Inventory['marijuana_type'],
										   $Inventory['marijuana_type']);
		$this->assertTrue($ExpectedResponse_Inventory['sent_for_testing'],
										   $Inventory['sent_for_testing']);
		$this->assertTrue($ExpectedResponse_Inventory['deleted_at'],
										   $Inventory['deleted_at']);
		$this->assertTrue($ExpectedResponse_Inventory['last_harvest_stage'],
										   $Inventory['last_harvest_stage']);
		$this->assertTrue($ExpectedResponse_Inventory['medically_compliant'],
										   $Inventory['medically_compliant']);
		$this->assertTrue($ExpectedResponse_Inventory['lab_result_file_path'],
										   $Inventory['lab_result_file_path']);
		$this->assertTrue($ExpectedResponse_Inventory['lab_results_attested'],
										   $Inventory['lab_results_attested']);
		$this->assertTrue($ExpectedResponse_Inventory['lab_results_date'],
										   $Inventory['lab_results_date']);
		$this->assertTrue($ExpectedResponse_Inventory['propagation_source'],
										   $Inventory['propagation_source']);
		$this->assertTrue($ExpectedResponse_Inventory['retail_to_medical'],
										   $Inventory['retail_to_medical']);
		$this->assertTrue($ExpectedResponse_Inventory['global_batch_id'],
										   $Inventory['global_batch_id']);
		$this->assertTrue($ExpectedResponse_Inventory['global_area_id'],
										   $Inventory['global_area_id']);
		$this->assertTrue($ExpectedResponse_Inventory['global_lab_result_id'],
										   $Inventory['global_lab_result_id']);
		$this->assertTrue($ExpectedResponse_Inventory['global_strain_id'],
										   $Inventory['global_strain_id']);
		$this->assertTrue($ExpectedResponse_Inventory['global_inventory_type_id'],
										   $Inventory['global_inventory_type_id']);
		$this->assertTrue($ExpectedResponse_Inventory['inventory_type_name'],
										   $Inventory['inventory_type_name']);
		$this->assertTrue($ExpectedResponse_Inventory['batch_type'],
										   $Inventory['batch_type']);

	}

}
