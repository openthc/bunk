<?php
/**
 * Not Sure what to Test Here
 */

namespace Test\Basic;

class Batch_Create_Test extends \OpenTHC\Bunk\Test\LeafData_Test
{
	protected function setUp() : void
	{
		$this->ghc = $this->_api([
			'license' => $_ENV['leafdata-license-g'],
			'license-secret' => $_ENV['leafdata-license-g-secret'],
		]);
	}

	function test_batch_create_harvest()
	{
		// Make a Harvset Batch
		// Create a Batch, this will fail
		$b0 = array(
			'global_area_id' => $_ENV['leafdata-license-g-zone'],
			'global_strain_id' => $_ENV['leafdata-license-g-strain'],
			'type' => 'harvest',
		);

		// propagation material' and 'plant'
		$res = $this->post('batches', array('batch' => array(0 => $b0)));
		$res = $this->assertValidResponse($res, 422);
		$this->assertIsArray($res['validation_messages']['type']);
		$this->assertRegExp('/submitted is invalid/', $res['validation_messages']['type'][0]);

	}

	function test_batch_create_plant_200()
	{
		// Make a Plant Batch w/2 Plants (from magic!)
		$b0 = array(
			'global_area_id' => $_ENV['leafdata-license-g-zone'],
			'global_strain_id' => $_ENV['leafdata-license-g-strain'],
			'type' => 'plant',
			'origin' => 'clone', // seed, plant, clone, tissue
			'num_plants' => 2,
		);

		// This has Created 0 New Plants?

		$res = $this->post('batches', array('batch' => array(0 => $b0)));
		$res = $this->assertValidResponse($res, 200);
		//print_r($res);

		$this->assertIsArray($res);
		$this->assertCount(1, $res);
		$obj = $res[0];
		$this->assertIsArray($obj);
		$this->assertCount(20, $obj);

	}

	function test_batch_create_plant_201()
	{
		// Make a Plant Batch w/2 Plants (from magic!)
		$b0 = array(
			'global_area_id' => $_ENV['leafdata-license-g-zone'],
			'global_strain_id' => $_ENV['leafdata-license-g-strain'],
			'type' => 'plant',
			'origin' => 'clone', // seed, plant, clone, tissue
			'num_plants' => 2,
		);

		// This has Created 0 New Plants?

		$res = $this->post('batches', array('batch' => array(0 => $b0)));
		$this->assertEquals(201, $res->getStatusCode(), 'KNOWN-BUG: MJF/LD Provides Incorrect Response Code');

	}


	function test_batch_create_product()
	{
		$b0 = array(
			'global_area_id' => $_ENV['leafdata-license-g-zone'],
			'global_strain_id' => $_ENV['leafdata-license-g-strain'],
			'type' => 'extract',
		);

		$res = $this->post('batches', array('batch' => array(0 => $b0)));
		$res = $this->assertValidResponse($res, 422);

	}

	function test_batch_create_propagation()
	{
		$chk = <<<JSON
{"error":true,"error_message":"","validation_messages":{"num_plants":["The num plants field is required when type is propagation material."],"origin":["The origin field is required when type is propagation material."]}}
JSON;
		// Make a Harvset Batch
		$b0 = array(
			'global_area_id' => $_ENV['leafdata-license-g-zone'],
			'global_strain_id' => $_ENV['leafdata-license-g-strain'],
			'type' => 'propagation material',
			'origin' => 'clone',
			'num_plants' => 2,
		);

		$res = $this->post('batches', array('batch' => array(0 => $b0)));

		$res = $this->assertValidResponse($res, 200);
		$this->assertCount(1, $res);
		$B = $res[0];
		$this->assertCount(19, $B);

		$this->assertEquals('propagation material', $B['type']);
		$this->assertEquals('clone', $B['origin']);
		$this->assertEquals(2, $B['num_plants']);
		$this->assertEquals($_ENV['leafdata-license-g-zone'], $B['global_area_id']);
		$this->assertEquals($_ENV['leafdata-license-g-strain'], $B['global_strain_id']);
		$this->assertEmpty($B['global_mother_plant_id']);
		$this->assertEmpty($B['global_flower_area_id']);
		$this->assertEmpty($B['global_other_area_id']);
		$this->assertEmpty($B['harvest_stage']);
		$this->assertEmpty($B['harvested_at']);

		// Now, this has created a new Inventory Type (aka Product)
		// And this Product has an Invalid Specification
		// It's intermediate_type is set to an invalid value of 'clone' when it should be 'clones'
		// And, there is no associated Inventory -- why even make this type?

		// Get Inventory
		$res = $this->get('inventories?f_batch_id=' . $B['global_id']);
		$this->assertCount(9, $res);
		$this->assertIsArray($res['data']);

		$lot = $res[0];

		$this->assertEquals($_ENV['leafdata-license-g-strain'], $lot['global_strain_id']);
		$this->assertEquals($_ENV['leafdata-license-g-zone'], $lot['global_area_id']);
		$this->assertEquals($b1['global_id'], $lot['global_batch_id']);
		$this->assertEquals(1, $lot['qty']);

		// Get Product
		$P = $this->get('inventory_types?f_global_id=' . $lot['global_inventory_type_id']);
		// The value should be 'clones' but LeafData is broken v1.37.5
		$this->assertEquals('clone', $P['intermediate_type'], 'LeafData has Fixed a Bug!');

		// // Correct the Error in LeafData
		// $mod = array(
		// 	'global_id' => $P['global_id'],
		// 	'intermediate_type' => 'clones',
		// );
		// $this->post('inventory_types/update', array('inventory_type' => array($mod)));
		// $P['intermediate_type'] = 'clones';

		// Get Updated Product
		// $res = $this->get('inventory_types?f_global_id=' . $lot['global_inventory_type_id']);
		// $this->assertIsArray($res);
		// $this->assertCount(1, $res['data']);
		// $p2 = $res['data'][0];
		//
		// $this->assertEquals('clones', $p2['intermediate_type']);
		// $this->assertEquals($p1, $p2);

	}

	function test_batch_create_propagation_201()
	{
		// Make a Harvset Batch
		$b0 = array(
			'global_area_id' => $_ENV['leafdata-license-g-zone'],
			'global_strain_id' => $_ENV['leafdata-license-g-strain'],
			'type' => 'propagation material',
			'origin' => 'clone',
			'num_plants' => 2,
		);

		$res = $this->post('batches', array('batch' => array(0 => $b0)));
		$this->assertEquals(201, $res->getStatusCode(), 'MJF/LD Provides Incorrect Response Code');

	}

	function x_test_batch_clone()
	{
		// Create a Batch, this will fail
		$b0 = array(
			'global_area_id' => $_ENV['leafdata-license-g-zone'],
			'global_strain_id' => $_ENV['leafdata-license-g-strain'],
			'type' => 'propagation material',
			'status' => 'open',
			'source' => 'inhouse',
			// 'global_inventory_type_id' => $P['global_id'],
			// 'qty' => '',
			// 'uom' => '',
		); //  $x))
		//$res = $this->post('batches', array('batch' => array(0 => $b0)));
		//print_r($res);

		// $res = $this->post('batches', array(
		// 	'global_area_id' => $_ENV['leafdata-zone-guid'],
		// 	'global_strain_id' => $_ENV['leafdata-strain-guid'],
		// 	'type' => 'propagation material',
		// 	'status' => 'open',
		//
		// 	// origin: Indicates propagation source of the batch (for "propagation material", "plant", and "harvest" batch types)
		// 	'origin' => 'plant', // seed, clone, plant, tissue
		// 	'plant_stage' => 'clone',
		// 	// 'num_plants' => 0
		// 	//'qty' => '',
		// 	//'uom' => '',
		// ));
		// print_r($res);


		// Response is:
		// {"error":true,"error_message":"Invalid data format. Please check your data..","validation_messages":[]}


// // TYPE:
// 'extraction'
//
// 'propagation material'
//
// 'status' => 'open',
// 'origin' => 'mature plant',
// 'source' => 'inhouse',
// 'plant_stage' => 'clone',
// 'num_plants' => 0, // Always zero, else LeafData creates them magically

	}

}
