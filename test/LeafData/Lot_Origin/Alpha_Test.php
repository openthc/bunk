<?php
/**
 * Tests some Routines with Origin Material
 */

namespace Test\Lot_Origin;

class Alpha_Test extends \OpenTHC\Bunk\Test\LeafData_Test
{
	protected function setUp() : void
	{
		$this->ghc = $this->_api([
			'license' => $_ENV['leafdata-license-g'],
			'license-secret' => $_ENV['leafdata-license-g-secret'],
		]);
	}

	public function x_test_Create_New_Seeds()
	{
		$res = $this->get('inventory_types');
		$res = $this->assertValidResponse($res);

		foreach ($res['data'] as $rec) {
			if ($rec['type'] == 'immature_plant') {
				if ($rec['intermediate_type'] == 'seeds') {
					// Use This
					//print_r($rec);
					$P = $rec;
					break;
				}
			}
		}

		// Create a Batch
		$res = $this->post('batches', array(
			'global_area_id' => $_ENV['leafdata-zone-guid'],
			'global_strain_id' => $_ENV['leafdata-strain-guid'],
			'type' => 'propagation material',
			'status' => 'open',
			'source' => 'inhouse',
			// origin: Indicates propagation source of the batch (for "propagation material", "plant", and "harvest" batch types)
			'origin' => 'plant', // seed, clone, plant, tissue
			'plant_stage' => 'clone',
			// 'num_plants' => 0
			//'qty' => '',
			//'uom' => '',
		));
		print_r($res);

		// Create the Seeds
		$res = $this->post('inventories', array(
			'global_area_id' => $_ENV['leafdata-zone-guid'],
			// 'global_batch_id' => $_ENV['leafdata-batch-guid'], // Make a new One
			'global_strain_id' => $_ENV['leafdata-strain-guid'],
			'global_inventory_type_id' => $P['global_id'],
			'qty' => '',
			'uom' => '',
		));
		//print_r($res);

		// Clean-Up?

		// $this->delete($P['global_id']);
		// $this->delete($P['global_id']);
		// $this->delete($P['global_id']);
		// $this->delete($P['global_id']);

	}

	public function x_test_Create_New_Clones()
	{
		$res = $this->get('inventory_types');
		$res = $this->assertValidResponse($res);

		foreach ($res['data'] as $rec) {
			if ($rec['type'] == 'immature_plant') {
				if ($rec['intermediate_type'] == 'clones') {
					// Use This
					//print_r($rec);
					break;
				}
			}
		}
		//print_r($res);
	}

	public function xz_test_Create_New_Plants()
	{
		$res = $this->get('inventory_types');
		$res = $this->assertValidResponse($res);

		//print_r($res);
		foreach ($res['data'] as $rec) {
			if ($rec['type'] == 'mature_plant') {
				if ($rec['intermediate_type'] == 'mature_plant') {
					// Use This
					//print_r($rec);
					break;
				}
			}
		}

	}


	// Durban Poision Clones
	public function test_propagaion_batch_with_wrong_type()
	{
		$res = $this->post('batches', array('batch' => array(array(
			'global_area_id' => $_ENV['leafdata-license-g-zone'],
			'global_strain_id' => $_ENV['leafdata-license-g-strain'],
			'type' => 'propagation material',
			'status' => 'open',
			'source' => 'inhouse',
			// origin: Indicates propagation source of the batch (for "propagation material", "plant", and "harvest" batch types)
			'origin' => 'plant', // seed, clone, plant, tissue
			'plant_stage' => 'clone',
			'num_plants' => 0
		))));
		$res = $this->assertValidResponse($res, 200, __METHOD__);

		// Flower Can be Finished into Five Caterories

		// HB/Flower can be Finished tinto

		//  Flower, FLower Lot, Other Material, Other Material Lots


	}

}
