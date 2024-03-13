<?php
/**
 * Inventory
 */

namespace Test\Lot_Process;

class Inventory extends \OpenTHC\Bunk\Test\LeafData_Test
{
	/**
	 * Usage:
	 * 	[NUM_PLANTS=10] ./vendor/bin/phpunit phpunit test/LeafData/5_Lot_Process/Inventory.php testCreateFlowerLot
	 *
	 */
	public function testCreatePlantBatch()
	{

		$numPlants = getenv('NUM_PLANTS') ?: '10';
		$type = 'plant';
		$origin = 'clone';
		/**
		 * Using standard Area, and Strain
		 */
		$Batch = [
			'type' => $type,
			'origin' => $origin,
			'global_area_id' =>   $_ENV['leafdata-zone-guid'],
			'global_strain_id' => $_ENV['leafdata-strain-guid'],
			'num_plants' => $numPlants,
		];

		// print_r($Batch);
		$res = $this->post('batches', [
			'batch' => [$Batch],
		]);
		// print_r($res);

		// $res = json_decode($res, true);
		$CreatedBatch = $res[0];
		$this->assertEquals($CreatedBatch['num_plants'], $numPlants);
		$this->assertEquals($CreatedBatch['type'], $type);
		$this->assertEquals($CreatedBatch['origin'], $origin);
		$this->assertTrue(!empty($CreatedBatch['global_id']));

		echo "\n\n New Batch for testing: " . $CreatedBatch['global_id'] . "\n\n";

		$this->assertTrue(empty($CreatedBatch['harvested_at']));
		$this->assertTrue(empty($CreatedBatch['harvest_stage']));
		$this->assertTrue(empty($CreatedBatch['global_mother_plant_id']));
		$this->assertTrue(empty($CreatedBatch['global_flower_area_id']));
		$this->assertTrue(empty($CreatedBatch['global_other_area_id']));
		$this->assertTrue(empty($CreatedBatch['global_child_batch_ids']));

		$this->assertTrue(!empty($CreatedBatch['planted_at']));
		$this->assertTrue(!empty($CreatedBatch['updated_at']));
		$this->assertTrue(!empty($CreatedBatch['created_at']));
		$this->assertTrue(!empty($CreatedBatch['global_mme_id']));
		$this->assertTrue(!empty($CreatedBatch['global_user_id']));

	}

	/**
	 * Usage:
	 * 	./vendor/bin/phpunit phpunit test/LeafData/5_Lot_Process/Inventory.php testCreateFlowerLot
	 *
	 */
	public function testCreateFlowerLot()
	{
		/**
		{"inventory" :[{
			"external_id": "12345",
			"is_initial_inventory": 1,
			"is_active": 1,
			"inventory_created_at": "12/01/2017",
			"inventory_packaged_at": "12/01/2017",
			"medically_compliant": 0,
			"qty": "1248.00",
			"uom": "gm",
			"global_batch_id": "WAG010101.BAH3",
			"global_area_id": "WAG010101.AR64",
			"global_strain_id": "WAG010101.ST4V",
			"global_inventory_type_id": "WAM030303.ITAH",
			"legacy_id": "1234567887654321"
		}]}
		 */
		$Inventory = [
			"medically_compliant" => 0,
			"uom" 				=> "ea",
			"qty" 				=> "10.00",
			"global_batch_id" 	=> getenv('BATCH_ID'),
			"global_area_id" 	=> $_ENV['leafdata-zone-guid'],
			"global_strain_id" 	=> $_ENV['leafdata-strain-guid'],
		];

		$res = $this->post('inventories', [
			'inventory' => [$Inventory],
		]);

		print_r($res);
	}
}
